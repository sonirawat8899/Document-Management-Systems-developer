<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmailContentController extends Controller
{
    public function emailContentAdd(Request $request){
        $companyId= auth()->user()->id;
        if(!empty($request->all())){
        $request->validate(
            [
              'email_type'=>'required',
              'subject'=>'required',
              'message'=>'required',

              ]
          );

            $inserData['email_type'] = $request->email_type;

            $inserData['subject'] = $request->subject;
            $inserData['message'] = $request->message;

            $user_id =  auth()->user()->id;
            $user_type = Auth::user()->type;

      
      
            if($user_type = "user"){
              $inserData['user_id'] = $user_id;
            }
            else if($user_type = "company"){
              $inserData['company'] = $user_id;
            }
      
            DB::table('email_contents')->insert($inserData);

            return redirect('/user/show_content')->with('success', 'Email content has been added successfully.');

    }else{

        $emailContents = DB::table('email_types')->select('id','email_type')->where('user_id', $companyId)->get();

        return view('user.email_management.content',['emailContents'=>$emailContents]);

}
}

    public function emailContentShow(){
        $userId= auth()->user()->id;
      
        $emailContents = DB::table('email_contents')->select(
            "email_contents.*", 
            "email_types.email_type"
        )
        ->leftJoin("email_types", "email_contents.email_type" ,"=", "email_types.id") ->orderBy('id','DESC')->where('email_contents.user_id',$userId)->get();
       

         return view('user.email_management.show_content',['emailContents'=>$emailContents]);
      
        }


         //Delete function to delete in user body
     public function emailContentDelete($id) {
        DB::delete('delete from email_contents where id ='.$id);
        return redirect('/user/show_content')->with('success', 'email content has been deleted successfully.');
     }

        //edit code in user body
        public function emailContentEdit(Request $request,$id)
        {

        $project_manager = DB::table('email_types')->select('id','email_type')->get();
        $emailContents = DB::table('email_contents')->where(['id'=> $id])->first();
        return view('user.email_management.edit_content')->with(['emailContents'=>$emailContents,'project_manager'=>$project_manager]);
       
        }

        public function emailContentUpdate(Request $request)
        {

            $request->validate(
                [
                'email_type'=>'required',
                'subject'=>'required',
                'message' =>'required',

                ]);

            DB::table('email_contents')
                ->where('id', $request['id'])
                ->update([
                    'email_type' => $request['email_type'],
                    'subject' => $request['subject'],
                    'message' => $request['message'],
                ]);
                return redirect('/user/show_content')->with('success', 'Email content has been updated successfully.');
        }
        public function EmailContentChangeStatus($id = null, $status = null)
    {
        $emailContents = DB::table('email_contents')->where('id', $id)->update(['status' => $status]);
        return back()->withInput()->with('success', 'Status has been changed.');
    }
}
