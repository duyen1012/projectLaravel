<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    function list(Request $request)
    {
        $status = $request->input("status");
        $list_act = array(
            'delete' => 'Xóa tạm thời',
        );
        if ($status == "trash") {
            $list_act = [
                'active' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $products = Product::onlyTrashed()->latest()->paginate(5);
        } else if ($status == "public") {
            $list_act = [
                'pending' => 'Chờ duyệt',
                'delete' => 'Xóa tạm thời',

            ];
            $products = Product::where('status', 1)->latest()->paginate(5);
        } else if ($status == 'pending') {
            $list_act = [
                'public' => 'Công khai',
                'delete' => 'Xóa tạm thời',
            ];
            $products = Product::where('status', 'inactive')->latest()->paginate(5);
        } else {
            $keyword = "";
            if ($request->input("keyword")) {
                $keyword = $request->input("keyword");
            }
            $products = Product::where("name", "Like", "%" . $keyword . "%")->paginate(10);
        }
        $count['all'] = Product::count();
        $count['public'] = Product::where('status', 1)->count();
        $count['pending'] = Product::where('status', 'inactive')->count();
        $count['trash'] = Product::onlyTrashed()->count();

        return view("admin.product.list", compact("products", "count", "list_act"));
    }
    function add(Request $request)
    {


        $status = ['0' => 'active', '1' => 'inactive', '2' => 'out_of_stock'];
        $categories = CategoryProduct::all();
        return view("admin.product.add", compact("status", "categories"));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,bmp,jpg',
            'product_images.*' => 'image|mimes:jpeg,png,bmp,jpg',
            'price' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'category_product_id' => 'required',
        ]);

        $imagePath = $request->file('product_image')->store('product_image', 'public');
        $product = Product::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'product_image' => $imagePath,
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'user_id' => Auth::id(),
            'category_product_id' => $validatedData['category_product_id'],
        ]);
        $productID = $product->id;

        if ($request->hasFile('product_images')) {
            $imagesList = $request->file('product_images');
            foreach ($imagesList as $imageFile) {
                $filePath = $imageFile->store('product_image', 'public');
                ProductImage::create([
                    'product_id' => $productID,
                    'image_url' => $filePath,
                ]);
            }
        }



       return redirect()->route('product.list')->with('status', 'Đã thêm sản phẩm thành công');
    }

    function edit(Request $request , $id){
        $categories = CategoryProduct::all();
        $product_status = ['0' => 'active' , '1' => 'inactive' , '2' => 'out_of_stock'];
        $product = Product::find($id);
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('admin.product.edit', compact('product','product_status', 'cats','categories'));
    }

    function update(Request $request , Product $product){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,bmp,jpg',
            'price' => 'required',
            'description' => 'nullable',
            'status' => 'nullable',
            'category_product_id' => 'required',
        ]);


        $imagePath = $request->file('product_image')->store('product_image', 'public');
        $product->update([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'product_image' => $imagePath,
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'user_id' => Auth::id(),
            'category_product_id' => $validatedData['category_product_id'],
        ]);
        return redirect()->route('product.list')->with('status', 'Đã cập nhật sản phẩm thành công');

    }
    function action(Request $request)
    {
        $list_check = $request->list_check;
        $action = $request->act;
        // dd(url()->previous());
        // $url = url()->previous();
        if (!empty($list_check)) {
            if (!empty($action)) {
                if ($action == 'delete') {
                    Product::destroy($list_check);
                    return redirect()->route('product.list')->with('status', 'Đã xóa tạm thời bản ghi thành công');
                } else if ($action == 'active') {
                    Product::onlyTrashed()->whereIn('id', $list_check)->restore();
                    return redirect()->route('product.list')->with('status', 'Đã khôi phục bản ghi thành công');
                } else if ($action == 'forceDelete') {
                    Product::onlyTrashed()->whereIn('id', $list_check)->forceDelete();
                    return redirect()->route('product.list')->with('status', 'Đã xóa vĩnh viển bản ghi thành công');
                } else if ($action == 'public') {
                    Product::whereIn('id', $list_check)->update([
                        'status' => 1
                    ]);
                    return redirect()->route('product.list')->with('status', 'Đã chuyển công khai bản ghi thành công');
                } else {
                    Product::whereIn('id', $list_check)->update([
                        'status' => 'inactive'
                    ]);
                    return redirect()->route('product.list')->with('status', 'Đã chuyển bản ghi thành công chờ duyệt');
                }

            }
            return redirect()->route('page.list')->with('status', 'Bạn cần chọn phần tử để thực thi');
        }
    }
}


function delete(Product $product)
{
    $product->delete();
    return redirect()->route('product.list')->with('status', 'Đã xóa sản phẩm thành công');
}




