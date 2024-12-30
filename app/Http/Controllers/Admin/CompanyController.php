<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CompanyController extends Controller
{
  public function index(){
    $company_data = db::table('companies')->leftjoin('users', 'users.id', '=', 'companies.user_id')->select('users.name','users.email','users.mobile','users.status as user_status','companies.*')->orderBy('companies.id','DESC')->get();
    return view('admin.company.view_company',['company_data'=>$company_data]);
  }

      public function addCompany(Request $request) {

        if(!empty($request->all())){
          $request->validate([
            'company_name' => 'required|string',
            'name'=>'required|max:50|string',
            'email'=>'required|email|unique:users',
            'mobile' =>'required|max:12',
          ]);

          $insertData['mobile'] = $request->mobile;
          $insertData['name'] = $request->name;
          $insertData['email']= $request->email;
          $insertData['type']= 2;
          $insertData['user_type']= 2;
          $insertData['password']=Hash::make($request->password);
          $userId = DB::table('users')->insertGetId($insertData);
            // insert data in companies table
          if($request->file('logo')){
            $image = $request->file('logo');
            $destinationPath = public_path('/images/logo');
            $logo_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $logo_name);
            $companyInsertData['logo'] = $logo_name;
          }
          $companyInsertData['slug'] =str_replace(' ', '-',$request->company_name);
          $companyInsertData['company_name'] =$request->company_name;
          $companyInsertData['user_id'] =$userId;
          $companyId = DB::table('companies')->insertGetId($companyInsertData);

          return redirect('admin/view_company')->with('success', 'Company has been added successfully.');
        }
        else{
          return view('admin.company.add_company');
        }
      }

      public function updateCompany($id){
        $company_data = db::table('companies')->leftjoin('users', 'users.id', '=', 'companies.user_id')->select('users.name','users.email','users.mobile','companies.*')->where(['companies.id'=> $id])->first();
        return view('admin.company.update_company')->with(['company_data'=>$company_data]);
      }

      public function editCompany(Request $request){

        $request->validate([
          'company_name' => 'required|string',
          'name'=>'required|max:50|string',
          'mobile' =>'required|max:12',
        ]);

          // update data in users table
        $updateData['mobile'] = $request->mobile;
        $updateData['name'] = $request->name;
        $updateData['email']= $request->email;
        $userId = DB::table('users')->where('id', $request->user_id)->update($updateData);

          //update data in users table
        if($request->file('logo')){
          $image = $request->file('logo');
          $destinationPath = public_path('/images/logo');
          $logo_name = rand().'.'.$image->getClientOriginalExtension();
          $image->move($destinationPath, $logo_name);
          $companyUpdateData['logo'] = $logo_name;
        }
        $companyUpdateData['slug'] =str_replace(' ', '-',trim($request->company_name));
        $companyUpdateData['company_name'] =$request->company_name;
        $userId = DB::table('companies')->where('id', $request['id'])->update($companyUpdateData);

        return redirect('admin/view_company')->with('success', 'Company has been updated successfully.');
      }

      public function delete_company($id) {

        $image = DB::table('companies')->select('logo')->where('user_id', $id)->first();
        // $imgpath = public_path('/images/logo/'.$image->logo);
        // unlink( $imgpath );
        $delete_from_companies = DB::table('companies')->where('user_id',$id)->delete();
        $delete_from_users = DB::table('users')->where('id',$id)->delete();

        return redirect('admin/view_company')->with('success', 'Company has been deleted successfully.');
      }

       // check if company name already exist
      public function checkCompany(Request $request){
        $company_name = $request['company_name'];
        $slug = str_replace(' ', '-',trim($request['company_name']));

        $id = $request['id'];
        if($id){
             $company_name = DB::table('companies')->select('company_name')->where('id','!=',$id)->where('slug',$slug)->first();

              if($company_name){
                $company_names = 1;
              }else{
                $company_names=0;
              }
        }
        else{
            $company_name = DB::table('companies')->select('company_name')->where('company_name',$company_name)->first();
            if($company_name){
              $company_names = 1;
            }else{
              $company_names=0;
            }
        }
        return $company_names;
      }
     // check if mobile number already exist
     public function checkMobile(Request $request){
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


// check if Email already exist
public function checkEmail(Request $request){
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
      //change status
      public function companyChangeStatus($id = null, $status = null)
      {
          $documentTypes = DB::table('users')->where('id', $id)->update(['status' => $status]);
          return back()->withInput()->with('success', 'Status has been changed.');
      }

}
