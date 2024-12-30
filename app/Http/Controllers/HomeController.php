<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Projects;
use App\Models\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(): View
    {
      return view('home');
    }

    public function adminHome(): View
    {
      return view('adminHome');
    }

    public function companyHome(): View
    {
        return view('companyHome');
    }
    public function userHome(): View
    {
        return view('userHome');
    }

    //List of users
    public function userManagement(){
      $users = DB::table('users')->select(
        "users.*",
        "companies.company_name" )
        ->leftJoin("companies",  "companies.id" ,"=", "users.company_id"  )->whereIn('type', [0])
        ->orderBy('id','DESC')->get();
      return view('admin.user.userManagement',['users'=>$users]);
    }

    //Delete function to delete in user body
    public function delete($id) {
      DB::delete('delete from users where id = ?',[$id]);
        return redirect('admin/userManagement')->with('success', 'User has been deleted successfully.');
    }

      //edit code in user body
    public function edit($id) {
      $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();
      $company_name = DB::table('companies')->select('id','company_name')->get();
        $users = DB::table('users')->where(['id'=> $id])->first();
        return view('admin.user.edit')->with(['users'=>$users,'project_manager'=>$project_manager,'company_name'=>$company_name]);
    }
      //Update Code
    public function update(Request $request){
      DB::table('users')
          ->where('id', $request['id'])
          ->update([
              'company_id' => $request['company_name'],
              'name' => $request['name'],
              'email' => $request['email'],
              'mobile' => $request['mobile'],
              'user_type' => $request['user_type'],

          ]);
      return redirect('admin/userManagement')->with('success', 'User has been updated successfully.');
    }

      //Insert data Code
    public function adduser(){
      $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();
      $company_name = DB::table('companies')->select('id','company_name')->get();
      return view('admin.user.adduser',['project_manager'=>$project_manager,'company_name'=>$company_name]);
    }
      //Save user data from the admin panel
    public function register(Request $request)
    {
      $request->validate(
        [
          'company_name'=>'required|max:50|string',
          'name'=>'required|max:50|string',
          'email'=>'required|email|unique:users',
          'mobile' =>'required|max:12',
          'password' => 'required|max:8',
          ]
      );
      $user_id =  Session::get('user_id');
      $user_type = Session::get('user_type');

      if($user_type = "admin"){
        $inserData['admin_id'] = $user_id;
        $inserData['manager_id'] = $user_id;
      }
      else if($user_type = "company"){
        $inserData['company'] = $user_id;
      }

      $inserData['company_id'] = $request->company_name;
      $inserData['name'] = $request->name;
      $inserData['email']= $request->email;
      $details = [
        'title' => 'Mail from dms.srmtechsol.com',
        'body' => 'Welcome in Document Manganent Proejct',
      ];
      \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

      $inserData['mobile'] = $request->mobile;
      $inserData['user_type'] = $request->user_type;
      $inserData['password'] = Hash::make($request->password);
      $inserData['company_id'] = $request->company_name;

      DB::table('users')->insert($inserData);
      return redirect('admin/userManagement')->with('success', 'User has been added successfully.');
    }
      //change status of user from admin panel
    public function UserChangeStatus($id=null, $status=null){
      $users = DB::table('users')->where('id',$id)->update(['status'=>$status]);
      return back()->withInput()->with('success','Status has been changed.');
    }

}
