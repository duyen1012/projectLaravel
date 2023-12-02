@extends('layouts.admin')
@section('title', 'Thêm bài viết')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm bài viết
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'post.store', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {{ Form::label('post_title', 'Tiêu đề bài viết') }}
                    {{ Form::text('post_title', old('post_title'), ['class' => 'form-control', 'id' => 'post_title']) }}
                    @error('post_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('post_slug', 'Slug') }}
                    {{ Form::text('post_slug', old('post_slug'), ['class' => 'form-control', 'id' => 'post_slug']) }}
                    @error('post_slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">

                    {{ Form::label('post_images', 'Hình ảnh') }}
                    <br />
                    {{ Form::file('post_images', ['class' => 'form-control', 'id' => 'post_images', 'style' => 'display:none;']) }}
                    <label for="post_images"><img
                            src="https://www.lifewire.com/thmb/TRGYpWa4KzxUt1Fkgr3FqjOd6VQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/cloud-upload-a30f385a928e44e199a62210d578375a.jpg"
                            id="post_image_preview" width="150"></label>
                    @error('post_images')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('post_content', 'Nội dung') }}
                    {{ Form::textarea('post_content', old('post_content'), ['class' => 'form-control', 'id' => 'post_content']) }}
                    @error('post_content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('post_status', 'Trạng thái') }}
                    {{ Form::select('post_status', $post_status, null, ['class' => 'form-control', 'id' => 'post_status']) }}
                    @error('post_status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('category_post_id', 'Loại bài viết') }}
                    <select class="form-control" name="category_post_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Image preview before upload
            $('#post_images').change(function(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function() {
                    var dataURL = reader.result;
                    $('#post_image_preview').attr('src', dataURL);
                };

                reader.readAsDataURL(input.files[0]);
            });
        });
    </script>
@endsection
