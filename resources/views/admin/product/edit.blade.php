@extends('layouts.admin')
@section('title', 'cập nhật sản phẩm')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật sản phẩm
            </div>

            <div class="card-body">

                {!! Form::open(['route' => ['product.update', $product->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('product_image', 'Hình ảnh') }}
                    <br />
                    {{ Form::file('product_image', ['class' => 'form-control', 'id' => 'product_image', 'style' => 'display:none;']) }}
                    <label for="product_image"><img
                            src={{ asset("storage/".$product->product_image) }}
                            id="product_image_preview" width="150"></label>
                    @error('product_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'Tên sản phẩm') }}
                    {{ Form::text('name', $product->name, ['class' => 'form-control', 'id' => 'name']) }}
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'Slug') }}
                    {{ Form::text('slug',$product->slug, ['class' => 'form-control', 'id' => 'slug']) }}
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    {{ Form::label('price', 'Gía') }}
                    {{ Form::text('price', $product->price, ['class' => 'form-control', 'id' => 'price']) }}
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Miêu tả') }}
                    {{ Form::textarea('description',$product->description, ['class' => 'form-control', 'id' => 'description']) }}
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('status', 'Trạng thái') }}
                    {{ Form::select('status', $product_status, null, ['class' => 'form-control', 'id' => 'status']) }}
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('category_product_id', 'Loại sản phẩm') }}
                    {{ Form::select('category_product_id',$cats, $product->category_product_id , ['class' => 'form-control', 'id' => 'category_product_id']) }}
                </div>


                <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#product_image').change(function(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function() {
                    var dataURL = reader.result;
                    $('#product_image_preview').attr('src', dataURL);
                };

                reader.readAsDataURL(input.files[0]);
            });
        });
        document.querySelector("#product_image_resuft").addEventListener("change", (e) => {
            // Kiểm tra xem trình duyệt có hỗ trợ File API không.
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                // Lấy các file đã được chọn.
                const files = e.target.files;
                // Lấy phần tử đầu ra.
                const output = document.querySelector("#result");

                // Xóa nội dung của phần tử đầu ra.
                output.innerHTML = "";
                var count = 0;

                // Lặp lại các tệp và tạo đối tượng FileReader cho mỗi tệp.
                for (let i = 0; i < files.length; i++) {
                    // Kiểm tra xem file có phải là file ảnh không.
                    if (!files[i].type.match("image")) continue;
                    const picReader = new FileReader();
                    // Thêm trình xử lý sự kiện vào đối tượng FileReader để xử lý sự kiện tải.
                    picReader.addEventListener("load", function(event) {
                        const picFile = event.target;

                        // Tạo phần tử div và nối URL dữ liệu vào phần tử đó.
                        const div = document.createElement("div");
                        div.innerHTML =
                            `<img class="thumbnail"  style="width:150px;height:150px; float:left;" src="${picFile.result}" title="${picFile.name}"/>`;
                        div.style.width = "600x";

                        // Nối phần tử div vào phần tử đầu ra.
                        output.appendChild(div);
                    });
                    // Đọc file dưới dạng URL dữ liệu.
                    picReader.readAsDataURL(files[i]);
                }
            } else {
                // Hiển thị thông báo cảnh báo nếu trình duyệt không hỗ trợ File API.
                alert("Your browser does not support File API");
            }
        });
    </script>
@endsection
