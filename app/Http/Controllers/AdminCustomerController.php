<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    function list(Request $request)
    {
        $status = $request->input("status");
        $list_act = [
            "delete" => "Xóa tạm thời",
        ];
        if ($status == "trash") {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $customers = Customer::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input("keyword")) {
                $keyword = $request->input("keyword");
            }
            $customers = Customer::where("name", "LIKE", "%" . $keyword . "%")->paginate(10);
        }
        $count_customer_active = Customer::count();
        $count_customer_trash = Customer::onlyTrashed()->count();

        $count = [$count_customer_active, $count_customer_trash];

        return view("admin.customer.list", compact("customers", "count","list_act"));
    }

    function add()
    {
        return view("admin.customer.add");
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:10',
            'address' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'phone' => 'required',
        ]);

        Customer::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
        return redirect()->route('customer.list')->with('status', 'Đã thêm thành công khách hàng');
    }

    function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    function update(Customer $customer, Request $request)
    {
        $request->validate([
            'name' => 'required|min:10',
            'address' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'phone' => 'required',
        ]);
        $customer->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('customer.list')->with('status', 'Đã cập nhật thành công khách hàng');
    }

    function delete(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.list')->with('status', 'Đã xóa thành công khách hàng');
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if (!empty($list_check)) {
            $act = $request->input('act');
            if ($act == 'delete') {
                Customer::destroy($list_check);
                return redirect()->route('customer.list')->with('status', 'Đã xóa thành công khách hàng');
            }
            if ($act == 'restore') {
                Customer::onlyTrashed()->whereIn('id', $list_check)->restore();
                return redirect()->route('customer.list')->with('status', 'Đã khôi phục thành công khách hàng');
            }
            if ($act == 'forceDelete') {
                Customer::withTrashed()
                    ->whereIn('id', $list_check)->forceDelete();
                return redirect()->route('customer.list')->with('status', 'Đã xóa vĩnh viễn thành công khách hàng');

            }

        }
        return redirect()->route('customer.list')->with('status', 'Bạn cần chọn phần tử để thực thi');


    }


}
