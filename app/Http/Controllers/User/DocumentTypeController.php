<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DocumentTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }



    //Show data
    public function documentTypeView()
    {  
        
        $userId= auth()->user()->id;
        $documentTypes = DB::table('document_types')->where('document_types.user_id',$userId)->orderBy('id', 'DESC')->get();
        return view('user.document_type.documentType_view', ['documentTypes' => $documentTypes]);
    }

    //Delete data
    public function documentTypeDelete($id)
    {   
        
        $authId = auth()->user()->id;
        DB::table('document_types')->where('user_id',$authId)->delete($id);
    
        // DB::delete('delete from document_types where id = ?', [$id]);
        return redirect('user/documentType_view')->with('success', 'Document type has been deleted successfully.');
    }

    //Insert data

    public function documentTypeAdd(Request $request)
    {
        if (!empty($request->all())) {
            $request->validate([
                'name' => 'required',
            ]
            );
            $status = $request->status == 'on' ? 1 : 0;
            $inserData['name'] = $request->name;

            $inserData['slug']= str_replace(' ', '-', trim($request->name));


            $user_id =  auth()->user()->id;
                $user_type = Auth::user()->type;
                if(Auth::user()->type=="user"){
                    $inserData['user_id']= auth()->user()->id;
                    $inserData['created_by']= Auth::user()->id;
                  }
                  if(Auth::user()->type=="user"){
                    $inserData['company_id']= Auth::user()->company_id;
                  }

            DB::table('document_types')->insert($inserData);
            return redirect('user/documentType_view')->with('success', 'Document type has been added successfully.');
        } else {
            return view('user.document_type.documentType_add');
        }

    }

    //edit code in user body
    public function documentTypeEdit(Request $request, $id)
    {
        $userId= auth()->user()->id;

        $documentTypes = DB::table('document_types')->where('user_id',$userId)->where(['id' => $id])->first();
        return view('user.document_type.documentType_edit')->with(['documentTypes' => $documentTypes]);
    }
    //Update Code
    public function documentTypeUpdate(Request $request)
    {
        $request->validate(
            ['name' => 'required',
            ]);

        $status = $request->status == 'on' ? 1 : 0;
        DB::table('document_types')
            ->where('id', $request['id'])
            ->update([
                'name' => $request['name'],
                'slug' => str_replace(' ', '-',trim($request['name'])),
                // 'name' => $request['name'],
            ]);
        return redirect('user/documentType_view')->with('success', 'Document type has been updated successfully.');

    }


   // check if document type name already exist
   public function checkDocumentType(Request $request){
    $name = $request['name'];
    $documenttype_slug = str_replace(' ', '-',$request['name']);
    $id = $request['id'];
    if($id){
         $name = DB::table('document_types')->select('name')->where('id','!=',$id)->where('name',$name,$documenttype_slug)->first();

          if($name){
            $name = 1;
          }else{
            $name=0;
          }
    }
    else{
        $name = DB::table('document_types')->select('name')->where('name',$name)->first();
        if($name){
          $name = 1;
        }else{
          $name=0;
        }
    }
    return $name;
  }

    public function DocumentTypeChangeStatus($id = null, $status = null)
    {
        $documentTypes = DB::table('document_types')->where('id', $id)->update(['status' => $status]);
        return back()->withInput()->with('success', 'Status has been changed.');
    }

}
