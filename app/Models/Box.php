<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = ['width', 'height', 'color', 'data'];

    public static function crtd($array)
    {
        Box::create($array);
    }
}
