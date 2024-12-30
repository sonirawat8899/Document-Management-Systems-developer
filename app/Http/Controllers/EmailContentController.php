<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class EmailContentController extends Controller
{
    public function content(){
        $users = DB::table('email_types')->select('id','email_type')->get();

        return view('admin.email_management.content',['users'=>$users]);
    }

    public function add_content(Request $request){

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


            DB::table('email_contents')->insert($inserData);

            return redirect('/admin/show_content')->with('success', 'Email content added successfully.');

    }

    public function show_content(){

        $users = DB::table('email_contents')->select(
            "email_contents.*", 
            "email_types.email_type"
        )
        ->leftJoin("email_types", "email_contents.email_type" ,"=", "email_types.id")->orderBy('id','DESC')
        ->get();
         return view('admin.email_management.show_content',['users'=>$users]);
        }


         //Delete function to delete in user body
     public function delete($id) {
        DB::delete('delete from email_contents where id ='.$id);
        return redirect('/admin/show_content')->with('success', 'email content has been deleted successfully.');
     }

        //edit code in user body
        public function edit_content(Request $request,$id)
        {

        $project_manager = DB::table('email_types')->select('id','email_type')->get();
        $users = DB::table('email_contents')->where(['id'=> $id])->first();
        return view('admin.email_management.edit_content')->with(['users'=>$users,'project_manager'=>$project_manager]);
       
        }

        public function update(Request $request)
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
                return redirect('/admin/show_content')->with('success', 'Email content updated successfully.');
        }
}


