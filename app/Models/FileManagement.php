<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FileManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'title',
        'status',
        
    ];

    protected $table = 'file_uploads'; 
}
