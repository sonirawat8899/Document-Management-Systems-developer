<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function documentView(){
        $documents = DB::table('file_uploads')->orderBy('id','DESC')->get();
      //  echo $users;die;
        return view('admin.document.show_document',['documents'=>$documents]);

    }
    //Delete function to delete in user body
    public function documentDelete($id) {
        DB::delete('delete from file_uploads where id = ?',[$id]);
        return redirect('admin/document')->with('success', 'Document has been deleted successfully.');
    }
    public function documentEdit(Request $request,$id) {
        $project_documents = DB::table('projects')->select('id','project_name')->get();
        $category_documents = DB::table('categories')->select('id','name')->get();
        $document_type= DB::table('document_types')->select('id','name')->get();
        $users = DB::table('file_uploads')->where(['id'=> $id])->first();
        return view('admin.document.edit_document')->with(['users'=>$users,'project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);

    }
    public function documentUpdate(Request $request){
        $request->validate(
            [
            'project_id'=>'required',
            'category_id'=>'required',
            'document_type_id' =>'required',
            'title' => 'required',
            ]);

        if(!empty($request->file('documents'))){
            $documents = $request->file('documents');
            $destinationPath = public_path('documents/');
            $documents_name = rand().'.'.$documents->getClientOriginalExtension();
            
            $documents->move($destinationPath, $documents_name);
           // $status = $request->status == 'on' ? 1 : 0;
            DB::table('file_uploads')
            ->where('id', $request['id'])
            ->update([

            'project_id' => $request['project_id'],
            'category_id' => $request['category_id'],
            'document_type_id' => $request['document_type_id'],
            'title' => $request['title'],
            'description' => strip_tags($request->description),
            'documents' => $documents_name,

            ]);
        }else{
            $status = $request->status == 'on' ? 1 : 0;
            DB::table('file_uploads')
            ->where('id', $request['id'])
            ->update([
                'project_id' => $request['project_id'],
                'category_id' => $request['category_id'],
                'description' => strip_tags($request->description),
                'title' => $request['title'],
            ]);
        }
        return redirect('admin/document')->with('success', 'Ducoment has been updated successfully.');
    }



    public function addDocument(Request $request){
        if(!empty($request->all())){

        $request->validate([
            'project_id' =>  'required',
            'category_id' => 'required',
            'document_type_id' =>  'required',
            'title' =>  'required',
           'document' =>  'required|mimes:pdf,xlsx,docx,ppt',
        ]);

        $document = $request->file('document');
        $destinationPath = public_path('/documents');
        $document_name = $request->project_id.'-'.$request->category_id.'-'.$request->document_type_id.$document->getClientOriginalExtension();
        $extension= $document->getClientOriginalExtension();
       
        $document->move($destinationPath, $document_name);

            $inserData['project_id'] = $request->project_id;
            $inserData['category_id']= $request->category_id;
            $inserData['document_type_id']= $request->document_type_id;
            $inserData['description'] = $request['description'];
            $inserData['title'] = $request->title;
            $inserData['documents'] = $document_name;
            $inserData['extension'] = $extension;

            DB::table('file_uploads')->insert($inserData);
            return  redirect('admin/document')->with('success', 'Document has been added successfully.');
        }else{
            $project_documents = DB::table('projects')->select('id','project_name')->get();
            $category_documents = DB::table('categories')->select('id','name')->get();
            $document_type= DB::table('document_types')->select('id','name')->get();
            return view ('admin.document.createdocument')->with(['project_documents'=>$project_documents,'category_documents'=>$category_documents,'document_type'=>$document_type]);
        }




    }
    public function documentChangeStatus($id=null, $status=null)   {
        $users = DB::table('file_uploads')->where('id',$id)->update(['status'=>$status]);
        return back()->withInput()->with('success','Status has been changed.');
    }

}

