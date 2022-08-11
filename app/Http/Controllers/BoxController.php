<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $box = Box::all()->map(function ($name, $key) {
            return [
                'data' => json_decode($name->data)
            ];
        });
        return $box;
    }
}
