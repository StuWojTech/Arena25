<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coaches extends Model
{
    use HasFactory;

    protected $table = 'coaches'; 
    protected $fillable = ['name', 'image', 'postion', 'facebook']; 
}
