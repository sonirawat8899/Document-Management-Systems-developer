<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Projects;
use App\Models\User;
use App\Mail\MyTestMail;

class UserController extends Controller
{
    //List of users
    public function userManagement(){
      $companyId= auth()->user()->id;
      $users = DB::table('users')->select(
        "users.*",
        "companies.company_name")
        ->leftJoin("companies",  "companies.id" ,"=", "users.company_id"  )->whereIn('type', [0])
        ->orderBy('id','DESC')->where('users.manager_id',$companyId)->get();
      return view('company.user.userManagement',['users'=>$users]);
    }

      //Delete function to delete in user body
    public function delete($id) {
        DB::delete('delete from users where id = ?',[$id]);
          return redirect('company/userManagement')->with('success', 'User has been deleted successfully.');
    }

        //edit code in user body
    public function edit($id) {
        $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();
        $company_name = DB::table('companies')->select('id','company_name')->get();
          $users = DB::table('users')->where(['id'=> $id])->first();
          return view('company.user.edit')->with(['users'=>$users,'project_manager'=>$project_manager,'company_name'=>$company_name]);
    }
        //Update Code
    public function update(Request $request){
      $request->validate(
        [
          'company_name'=>'required|max:50|string',
          'name'=>'required|max:50|string',
          'email'=>'required|email|',
          'mobile' =>'required|max:12',
          ]
      );
        DB::table('users')
            ->where('id', $request['id'])
            ->update([
                'company_id' => $request['company_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'mobile' => $request['mobile'],
                'user_type' => $request['user_type'],

            ]);
        return redirect('company/userManagement')->with('success', 'User has been updated successfully.');
    }

        //Insert data Code
    public function adduser(){
     
        $project_manager = DB::table('usertype')->select('id','name')->whereIn('id', [2,0])->get();
        $company_name = DB::table('companies')->select('id','company_name')->get();
        return view('company.user.adduser',['project_manager'=>$project_manager,'company_name'=>$company_name]);
    }
        //Save user data from the company panel
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

        if($user_type = "company"){
          $inserData['company_id'] = $user_id;
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
        Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

        $inserData['mobile'] = $request->mobile;
        $inserData['user_type'] = $request->user_type;
        $inserData['password'] = Hash::make($request->password);
        $inserData['company_id'] = $request->company_name;

        DB::table('users')->insert($inserData);
        return redirect('company/userManagement')->with('success', 'User has been added successfully.');
    }
        //change status of user from company panel
    public function UserChangeStatus($id=null, $status=null){
        $users = DB::table('users')->where('id',$id)->update(['status'=>$status]);
        return back()->withInput()->with('success','Status has been changed.');
    }
    public function checkUserEmail(Request $request){
        $email = $request['email'];
        $id = $request['id'];
        if($id){
             $email = DB::table('users')->select('email')->where('id','!=',$id)->where('email',$email)->first();

              if($email){
                $email = 1;
              }else{
                $email=0;
              }
        }
        else{
            $email = DB::table('users')->select('email')->where('email',$email)->first();
            if($email){
              $email = 1;
            }else{
              $email=0;
            }
        }
        return $email;
      }
      public function checkUserMobile(Request $request){
        $mobile = $request['mobile'];
        $id = $request['id'];
        if($id){
             $mobile = DB::table('users')->select('mobile')->where('id','!=',$id)->where('mobile',$mobile)->first();

              if($mobile){
                $mobile = 1;
              }else{
                $mobile=0;
              }
        }
        else{
            $mobile = DB::table('users')->select('mobile')->where('mobile',$mobile)->first();
            if($mobile){
              $mobile = 1;
            }else{
              $mobile=0;
            }
        }
        return $mobile;
      }
}

