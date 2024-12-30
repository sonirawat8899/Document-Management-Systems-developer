<?php 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\CashierServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomMail;


class Common {

	static function getImage($id=null, ){
			
		$sttings = DB::table('company')->where(['id'=> $id])->first();
   		// print_r($sttings);die;
		return $sttings;  
	
	}

	// static function addPermission($user_id, $module_id){
	// 	$add_permission = DB::table('modules_permissions')->where(['module_id'=> $module_id,'user_id'=> $user_id ])->first();
	// 	if($add_permission){
	// 		return $add_permission;
	// 	}else{
	// 		return false;
	// 	}
	// }
}
