<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Session;

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
            $inserData['category_slag'] = str_replace(' ', '_', trim($request->name));
            $inserData['description'] = $request->description;
            DB::table('categories')->insert($inserData);
            return redirect('admin/view_category')->with('success', 'Category has been added successfully.');
        }else{
            $parent_catogeris=DB::table('categories')->select('id','name')->get();

            
            return view ('admin.category.category')->with(['parent_categories'=> $parent_catogeris]);
        }
        }

    public function categoryView(){
        $categories = DB::table('categories')->orderBy('id','DESC')->get();
        return view('admin.category.view_category',['categories'=>$categories]);
    }
    public function categoryChangeStatus($id=null, $status=null)   {
        $categories = DB::table('categories')->where('id',$id)->update(['status'=>$status]);
        return back()->withInput()->with('success','Status has been changed.');
    } 

    public function categoryDelete($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect('admin/view_category')->with('success', 'Category has been deleted successfully.');
    }

    public function categoryUpdate(Request $request,$id) {
        $users = DB::table('categories')->where(['id'=> $id])->first();
        $parent_catogeris=DB::table('categories')->select('id','name')->get();
        return view('admin.category.update_category')->with(['users'=>$users,'parent_categories'=> $parent_catogeris]);
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
        return redirect('admin/view_category')->with('success', 'Category has been updated successfully.');
    }

    // check if name already exist
    public function checkName(Request $request){
        $name = $request['name'];
        $id = $request['id'];

      
        $category_slag = str_replace(' ', '-',$request['name']);
        $name = DB::table('categories')->select('name')->where('id','!=',$id)->where('category_slag',$category_slag)->first();

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