<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DocumentTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // code by soni start

    //Show data
    public function documentTypeView()
    {
        $documentTypes = DB::table('document_types')->orderBy('id', 'DESC')->get();
        return view('admin.document_type.documentType_view', ['documentTypes' => $documentTypes]);
    }

    //Delete data
    public function documentTypeDelete($id)
    {
        DB::delete('delete from document_types where id = ?', [$id]);
        return redirect('admin/documentType_view')->with('success', 'Document type has been deleted successfully.');
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

            DB::table('document_types')->insert($inserData);
            return redirect('admin/documentType_view')->with('success', 'Document type has been added successfully.');
        } else {
            return view('admin.document_type.documentType_add');
        }

    }

    //edit code in user body
    public function documentTypeEdit(Request $request, $id)
    {

        $documentTypes = DB::table('document_types')->where(['id' => $id])->first();
        return view('admin.document_type.documentType_edit')->with(['documentTypes' => $documentTypes]);
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
        return redirect('admin/documentType_view')->with('success', 'Document type has been updated successfully.');

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
    //code by soni end
}
