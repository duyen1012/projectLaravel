@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm" name="keyword"
                            value="{{ request()->keyword }}">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ route('product.list') }}?status=all" class="text-primary">Tất cả
                        <span class="text-muted">({{ $count['all'] }})</span></a>
                    <a href="{{ route('product.list') }}?status=public" class="text-primary">Công
                        khai<span class="text-muted">({{ $count['public'] }})</span></a>
                    <a href="{{ route('product.list') }}?status=pending" class="text-primary">Chờ
                        duyệt<span class="text-muted">({{ $count['pending'] }})</span></a>
                    <a href="{{ route('product.list') }}?status=trash" class="text-primary">Vô hiệu
                        hóa<span class="text-muted">({{ $count['trash'] }})</span></a>

                </div>
                <form action="{{ route('product.action') }}">
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="" name="act">
                            <option>Chọn</option>
                            @foreach ($list_act as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Miêu tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->total() > 0)


                                @php
                                    $t = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr class="">
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $product->id }}">
                                        </td>
                                        <td>{{ $t++ }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ number_format($product->price, 0, 0, '.') }}</td>
                                        <td><img src="{{ asset('storage/' . $product->product_image) }}" alt=""
                                                style="width: 80px"></td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->user_id }}</td>
                                        <td>{{ $product->category_product_id }}</td>
                                        <td>{{ $product->created_at }}</td>

                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a><br>
                                            <a href="{{ route('product.delete', $product->id) }}"
                                                onclick="return confirm('Bạn chắc chắn xóa bản ghi này')"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a><br>
                                            <a href="" class="btn btn-success btn-sm rounded-0 text-white"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Detail"><i
                                                    class="fa-solid fa-circle-info"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="12">Không có bản ghi nào</td>
                            @endif

                        </tbody>
                    </table>
                </form>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">Trước</span>
                                <span class="sr-only">Sau</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
