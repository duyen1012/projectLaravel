@extends('layouts.admin')
@section('title', 'Danh sách bài viết')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách bài viết</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm" name="keyword" value="{{ request()->keyword }}">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>

                </div>
                <form action="{{ url('admin/post/action') }}">
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
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Loại bài viết</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>


                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->total() > 0)
                            @php
                                $t = 1;
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{$post->post_id}}">
                                    </td>
                                    <td scope="row">{{ $t++ }}</td>

                                    <td>{{ $post->post_title }}</td>
                                    <td>{{ $post->post_slug }}</td>
                                    <td><img src="{{ asset('storage/' . $post->post_images) }}" alt=""
                                            style="width: 80px"></td>
                                    <td>{{ $post->post_content }}</td>
                                    <td>{{ $post->post_status }}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td>{{ $post->category_post_id }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->post_id) }}"
                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>

                                        <a href="{{ route('post.delete', $post->post_id) }}" onclick="return confirm('Bạn chắc chắn xóa bản ghi này')"
                                            class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>


                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <td colspan="11">Không có bản ghi nào</td>
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
