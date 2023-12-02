<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class AdminProductImageController extends Controller
{
    function list(){
        $product_images = ProductImage::all();
        return view("admin.product_image.list",compact("product_images"));
    }
}
