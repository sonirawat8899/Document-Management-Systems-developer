<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }


	 public function setting(){
		           $logos = DB::table('logos')->first();

			return view('admin.setting.setting')->with(['logos'=>$logos]);
	}

public function Updateimage(Request $request) {

		$data = array();
        if($request->file('logo')){
            $image = $request->file('logo');
                $destinationPath = public_path('/images/logo');
                $logo_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $logo_name);

                $inserData['logo'] = $logo_name;
				$update = DB::table('logos')->where('id',$request->id)->update($inserData);
                return redirect('/admin/logos')->with('success', 'Profile & logo has been updated successfully.');

        }

        if($request->file('profile')){
				$image = $request->file('profile');
                $destinationPath = public_path('/images/profile/');
                $profile_name = rand().'.'.$image->getClientOriginalExtension();
				$image->move($destinationPath, $profile_name);
				$inserData['profile'] = $profile_name;
				$update = DB::table('logos')->where('id',$request->id)->update($inserData);
                return redirect('/admin/logos')->with('success', 'Profile & logo has been updated successfully.');

        }
        else {
            return redirect()->back()->with('error', 'Image could not updated .');
        }



    }




}

