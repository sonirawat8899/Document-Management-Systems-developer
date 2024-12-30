<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmailTypeController extends Controller
{
    public function emailTypeAdd(Request $request){
        if(!empty($request->all())){
        $request->validate(
            [
              'email_type'=>'required',

              ]
          );

            $inserData['email_type'] = $request->email_type;
            $user_id =  auth()->user()->id;
            $user_type = Auth::user()->type;
      
      
      
            if($user_type = "user"){
              $inserData['user_id'] = $user_id;
            }
            else if($user_type = "company"){
              $inserData['company'] = $user_id;
            }
      

            DB::table('email_types')->insert($inserData);

            return redirect('/user/show_email')->with('success', 'Email type has been added successfully.');

    }
    else{
        return view('user.email_management.email');
    }
}

    public function emailTypeShow(){
        $userId= auth()->user()->id;
       

         $emailTypes = DB::table('email_types')->where('user_id',$userId)->orderBy('id','DESC')->get();
         return view('user.email_management.show_email',['emailTypes'=>$emailTypes]);
        }


         //Delete function to delete in user body
     public function emailTypeDelete($id) {
        DB::delete('delete from email_types where id ='.$id);
        return redirect('/user/show_email')->with('success', 'email type has been deleted successfully.');
     }

        //edit code in user body
        public function emailTypeEdit(Request $request,$id)
        {
           $emailTypes = DB::table('email_types')->where(['id'=> $id])->first();
           return view('user.email_management.edit_email')->with(['emailTypes'=>$emailTypes]);
        }

        public function emailTypeUpdate(Request $request)
        {

            $request->validate(
                [
                  'email_type'=>'required',

                  ]
              );

            DB::table('email_types')
                ->where('id', $request['id'])
                ->update([
                    'email_type' => $request['email_type'],

                ]);
                return redirect('/user/show_email')->with('success', 'Email type has been updated successfully.');
        }
        public function EmailTypeChangeStatus($id = null, $status = null)
        {
            $emailType = DB::table('email_types')->where('id', $id)->update(['status' => $status]);
            return back()->withInput()->with('success', 'Status has been changed.');
        }

}
