<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmailTypeController extends Controller
{
    // public function email(){

    //     return view('admin.email_management.email');
    // }

    public function emailTypeAdd(Request $request){
        if(!empty($request->all())){
        $request->validate(
            [
              'email_type'=>'required',

              ]
          );

            $inserData['email_type'] = $request->email_type;


            DB::table('email_types')->insert($inserData);

            return redirect('/admin/show_email')->with('success', 'Email type has been added successfully.');

    }
    else{
        return view('admin.email_management.email');
    }
}

    public function emailTypeShow(){

         $emailTypes = DB::table('email_types')->orderBy('id','DESC')->get();
         return view('admin.email_management.show_email',['emailTypes'=>$emailTypes]);
        }


         //Delete function to delete in user body
     public function emailTypeDelete($id) {
        DB::delete('delete from email_types where id ='.$id);
        return redirect('/admin/show_email')->with('success', 'email type has been deleted successfully.');
     }

        //edit code in user body
        public function emailTypeEdit(Request $request,$id)
        {
           $emailTypes = DB::table('email_types')->where(['id'=> $id])->first();
           return view('admin.email_management.edit_email')->with(['emailTypes'=>$emailTypes]);
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
                return redirect('/admin/show_email')->with('success', 'Email type has been updated successfully.');
        }
        public function EmailTypeChangeStatus($id = null, $status = null)
        {
            $emailType = DB::table('email_types')->where('id', $id)->update(['status' => $status]);
            return back()->withInput()->with('success', 'Status has been changed.');
        }

}
