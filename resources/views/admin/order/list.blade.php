@extends('layouts.admin')
@section('title', 'Danh sách đơn hàng')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('errors'))
                <div class="alert alert-danger">
                    {{ session('errors') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách đơn hàng</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm" name="kw"
                            value="{{ request()->kw }}">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ route('order.list') }}?status=all" class="text-primary">Tất cả
                        <span class="text-muted">({{ $count['all'] }})</span></a>
                    <a href="{{ route('order.list') }}?status=processing" class="text-primary">Đang xử lý<span
                            class="text-muted">({{ $count['processing'] }})</span></a>
                    <a href="{{ route('order.list') }}?status=delivery" class="text-primary">Đang giao<span
                            class="text-muted">({{ $count['delivery'] }})</span></a>
                    <a href="{{ route('order.list') }}?status=complete" class="text-primary">Hoàn thành<span
                            class="text-muted">({{ $count['complete'] }})</span></a>
                    <a href="{{ route('order.list') }}?status=cancel" class="text-primary">Hủy đơn
                        hóa<span class="text-muted">({{ $count['cancel'] }})</span></a>
                </div>
                <form action="{{ route('order.action') }}">
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="" name="act">
                            <option>Chọn</option>
                            @foreach ($list_act as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Số lượng sản phẩm</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Hình thức thanh toán</th>
                                <th scope="col">Địa chỉ ship</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $t = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{ $order->order_id }}">
                                    </td>
                                    <td>{{ $t++ }}</td>
                                    <td>{{ $order->product_quantity }}</td>

                                    <td>{{ number_format($order->total_amount, 0, 0, '.') }}</td>

                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                    @if ($order->status == 0)
                                        <td>
                                            <span
                                                class="badge {{ request()->status == 'cancel' ? 'badge-dark' : 'badge-warning' }}">
                                                Đang xử lý</span>
                                        </td>
                                    @endif
                                    @if ($order->status == 1)
                                        <td><span
                                                class="badge {{ request()->status == 'cancel' ? 'badge-dark' : 'badge-info' }}">Đang
                                                giao hàng</span></td>
                                    @endif
                                    @if ($order->status == 2)
                                        <td><span
                                                class="badge {{ request()->status == 'cancel' ? 'badge-dark' : 'badge-success' }}">Hoàn
                                                thành</span></td>
                                    @endif
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>

                                            <a href="{{ route('order.seen', ['order_id' => $order->order_id]) }}"
                                                class="btn btn-info btn-sm rounded-0" data-toggle="tooltip"
                                                title="Seen"><i class="fa-solid fa-eye"></i></a>

                                        {{-- @if (Auth::user()->can('huy-don-hang'))
                                            @if (request()->status != 'cancel')
                                                <a href="{{ route('order.cancel', ['order_id' => $item->order_id]) }}"
                                                    onclick="return confirm('Bán có chắc chắn muốn xóa bản ghi này')"
                                                    class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        @endif --}}
                                    </td>
                                </tr>
                            @endforeach


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
