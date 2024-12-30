<?php

namespace App\Http\Controllers\Company;

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
            // $inserData['company_id'] = $request->company_id;
            if(Auth::user()->type=="company"){
				$inserData['company_id']= Auth::user()->id;
				$inserData['created_by']= Auth::user()->id;
			}
			if(Auth::user()->type=="user"){
				$inserData['company_id']= Auth::user()->company_id;
              
			}

            DB::table('email_types')->insert($inserData);

            return redirect('/company/show_email')->with('success', 'Email type has been added successfully.');

    }
    else{
        return view('company.email_management.email');
    }
}

    public function emailTypeShow(){

        $companyId=Auth::user()->id;
         $emailTypes = DB::table('email_types')->where('company_id',$companyId)->orderBy('id','DESC')->get();
         return view('company.email_management.show_email',['emailTypes'=>$emailTypes]);
        }


         //Delete function to delete in user body
     public function emailTypeDelete($id) {
        $authId = Auth::user()->id;

        // DB::delete('delete from email_types where id ='.$id);
        DB::table('email_types')->where('company_id',$authId)->delete($id);
        return redirect('/company/show_email')->with('success', 'email type has been deleted successfully.');
     }

        //edit code in user body
        public function emailTypeEdit(Request $request,$id)
        {
            $companyId=Auth::user()->id;

           $emailTypes = DB::table('email_types')->where(['id'=> $id])->where('company_id',$companyId)
           ->first();
           return view('company.email_management.edit_email')->with(['emailTypes'=>$emailTypes]);
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
                return redirect('/company/show_email')->with('success', 'Email type has been updated successfully.');
        }
        public function EmailTypeChangeStatus($id = null, $status = null)
        {
            $emailType = DB::table('email_types')->where('id', $id)->update(['status' => $status]);
            return back()->withInput()->with('success', 'Status has been changed.');
        }
}
