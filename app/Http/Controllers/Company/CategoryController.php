<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    

    public function categoryAdd(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'parent_id' =>  'required',
                'name' => 'required|string',
            ]);
    
            $inserData['parent_id'] = $request->parent_id;
            $inserData['name']= $request->name;
            $inserData['category_slag']= str_replace(' ', '_', $request->name);
            $inserData['description'] = $request->description;

          //  echo"<pre>"; dd( Auth::user()->type);die;
            if(Auth::user()->type=="company"){
				$inserData['company_id']= Auth::user()->id;
                $inserData['created_by']= Auth::user()->id;
			}
			if(Auth::user()->type=="user"){
				$inserData['company_id']= Auth::user()->company_id;
			}

            DB::table('categories')->insert($inserData);
            return redirect('company/view_category')->with('success', 'Category has been added successfully.');
        }else{
            $parent_catogeris=DB::table('categories')->select('id','name')->get();
            return view ('company.category.category')->with(['parent_categories'=> $parent_catogeris]);
        }
        }

    public function categoryView(){
        $companyId=Auth::user()->id;
        $categories = DB::table('categories')->where('company_id',$companyId)->orderBy('id','DESC')->get();
        return view('company.category.view_category',['categories'=>$categories]);
    }
    public function categoryChangeStatus($id=null, $status=null){
        $categories = DB::table('categories')->where('id',$id)->update(['status'=>$status]);
        return back()->withInput()->with('success','Status has been changed.');
    } 

    public function categoryDelete($id) {
        $companyId=Auth::user()->id;
        DB::table('categories')->where('company_id',$companyId)->delete($id);
        return redirect('company/view_category')->with('success', 'Category has been deleted successfully.');
    }

    public function categoryUpdate(Request $request,$id) {
        $companyId=Auth::user()->id;
        $users = DB::table('categories')->where(['id'=> $id])->where('company_id',$companyId)->first();
        $parent_catogeris=DB::table('categories')->select('id','name')->get();
        return view('company.category.update_category')->with(['users'=>$users,'parent_categories'=> $parent_catogeris]);
    }

    public function categoryEdit(Request $request){
        $request->validate([
            'parent_id' =>  'required',
            'name' => 'required',
        ]);
            DB::table('categories')
            ->where('id', $request['id'])
            ->update([
                'parent_id' => $request['parent_id'],
                'name' => $request['name'],
                'description' => $request['description'],
            ]);
        return redirect('company/view_category')->with('success', 'Category has been updated successfully.');
    }
     // check if name already exist
     public function checkName(Request $request){
        $name = $request['name'];
        $id = $request['id'];
      
        if($id){ 
             $name = DB::table('categories')->select('name')->where('id','!=',$id)->where('name',$name)->first();
            
              if($name){
                $name = 1;
              }else{
                $name=0;
              }
        }
        else{
            $name = DB::table('categories')->select('name')->where('name',$name)->first();
            if($name){
              $name = 1;
            }else{
              $name=0;
            }
        }
       return $name;
      }

}
