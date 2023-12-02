<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    function list(Request $request)
    {

        $status = $request->input("status");
        $list_act = [
            "delete"=> "Xóa tạm thời",
        ];

        if ($status == "trash") {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $pages = Page::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input("keyword")) {
                $keyword = $request->input("keyword");
            }
            $pages = Page::where("page_title", "like", "%" . $keyword . "%")->paginate(10);
        }

        $count_page_active = Page::count();
        $count_page_trash = Page::onlyTrashed()->count();

        $count = [$count_page_active, $count_page_trash];

        return view("admin.page.list", compact("pages", "count","list_act"));
    }

    function add()
    {
        return view("admin.page.add");
    }

    function store(Request $request)
    {
        $request->validate([
            'page_title' => 'required',
            'page_slug' => 'required',

        ]);

        Page::create([
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_content' => $request->input('page_content'),

            'user_id' => Auth::id(),

        ]);
        return redirect()->route('page.list')->with('status', 'Đã thêm thành công');
    }

    function edit(Request $request, $id)
    {
        $page = Page::find($id);

        return view('admin.page.edit', compact('page'));
    }

    function update(Page $page, Request $request)
    {
        $request->validate([
            'page_title' => 'required',
            'page_slug' => 'required',
        ]);

        $page->update([
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_content' => $request->input('page_content'),

            'user_id' => Auth::id(),
        ]);
        return redirect()->route('page.list')->with('status', 'Đã cập nhật thành công');
    }

    function delete(Page $page)
    {
        $page->delete();
        return redirect()->route('page.list')->with('status', 'Đã xóa thành công');
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if (!empty($list_check)) {
            $act = $request->input('act');
            if ($act == 'delete') {
                Page::destroy($list_check);
                return redirect()->route('page.list')->with('status', 'Đã xóa thành công');
            }
            if($act == 'restore'){
                Page::onlyTrashed()->whereIn('id', $list_check)->restore();
                return redirect()->route('page.list')->with('status', 'Đã khôi phục thành công');
            }
            if ($act == 'forceDelete') {
                Page::withTrashed()
                    ->whereIn('id', $list_check)->forceDelete();
                return redirect('admin/page/list')->with('status', 'Bạn đã xóa vĩnh viễn user');

            }

        }
        return redirect()->route('page.list')->with('status', 'Bạn cần chọn phần tử để thực thi');


    }
}
