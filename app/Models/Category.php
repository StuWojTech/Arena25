<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function halls()
    {
        return $this->hasmany(Hall::class);
    }
}
