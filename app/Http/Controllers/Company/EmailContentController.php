<?php

namespace App\Http\Controllers\Company;

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

            if(Auth::user()->type=="company"){
				$inserData['company_id']= Auth::user()->id;
				$inserData['created_by']= Auth::user()->id;
			}
			if(Auth::user()->type=="user"){
				$inserData['company_id']= Auth::user()->company_id;
              
			}


            DB::table('email_contents')->insert($inserData);

            return redirect('/company/show_content')->with('success', 'Email content has been added successfully.');

    }else{

        $emailContents = DB::table('email_types')->select('id','email_type')->where('company_id', $companyId)->get();

        return view('company.email_management.content',['emailContents'=>$emailContents]);

}
}

    public function emailContentShow(){
       $companyId=Auth::user()->id;
        
        
        $emailContents = DB::table('email_contents')->select(
            "email_contents.*", 
            "email_types.email_type"
        )
        ->leftJoin("email_types", "email_contents.email_type" ,"=", "email_types.id")->where('email_contents.company_id',$companyId)->orderBy('id','DESC')
        ->get();
         return view('company.email_management.show_content',['emailContents'=>$emailContents]);
      
        }


         //Delete function to delete in user body
     public function emailContentDelete($id) {
        $authId = Auth::user()->id;
       
        // DB::delete('delete from email_contents where id ='.$id);
        DB::table('email_contents')->where('company_id',$authId)->delete($id);
        return redirect('/company/show_content')->with('success', 'email content has been deleted successfully.');
     }

        //edit code in user body
        public function emailContentEdit(Request $request,$id)
        {
        $companyId=Auth::user()->id;
        $project_manager = DB::table('email_types')->select('id','email_type')->get();
        $emailContents = DB::table('email_contents')->where(['id'=> $id])->where('company_id',$companyId)->first();
        return view('company.email_management.edit_content')->with(['emailContents'=>$emailContents,'project_manager'=>$project_manager]);
       
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
                return redirect('/company/show_content')->with('success', 'Email content has been updated successfully.');
        }
        public function EmailContentChangeStatus($id = null, $status = null)
    {
        $emailContents = DB::table('email_contents')->where('id', $id)->update(['status' => $status]);
        return back()->withInput()->with('success', 'Status has been changed.');
    }
}
