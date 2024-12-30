<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "company"][$value],
        );
    }

    public static function getDocumentTypeID($document_id){
        $document_type = DB::table('document_types')->select('name')->where('id', $document_id)
        ->first();
        if(!empty($document_type->name)){
            return $document_type->name;
        }else{
            return '';
        }
    }

    public static function getCategoryID($category_id){
        $category = DB::table('categories')->select('name')->where('id', $category_id)
        ->first();
        if(!empty($category->name)){
            return $category->name;
        }else{
            return '';
        }
    }

    public static function getUserID($user_id){
        $user = DB::table('users')->select('name')->where('id', $user_id)
        ->first();
        if(!empty($user->name)){
            return $user->name;
        }else{
            return '';
        }

    }

    public static function getDocumentID($project_id){
        $user = DB::table('projects')->select('project_name')->where('id', $project_id)
        ->first();
        if(!empty($user->project_name)){
            return $user->project_name;
        }else{
            return '';
        }

    }

    public static function getCategoryParentID($categories_id){
        $users = DB::table('categories')->select('name')->where('id', $categories_id)
        ->first();
        if(!empty($users->name)){
            return $users->name;
        }else{
            return '';
        }
    }
    // public static function getCompanyName($company_id){
    //     $users = DB::table('companies')->select('company_name')->where('id', $company_id)
    //     ->first();
    //     if(!empty($users->company_name)){
    //         return $users->company_name;
    //     }else{
    //         return '';
    //     }
    // }

}
