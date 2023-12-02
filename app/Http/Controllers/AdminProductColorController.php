<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class AdminProductColorController extends Controller
{
    function list(){
        $productColors = ProductColor::all();
        return view("admin.color.list",compact("productColors"));
    }
}
