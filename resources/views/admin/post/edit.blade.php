@extends('layouts.admin')
@section('title', 'Cập nhật bài viết')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật bài viết
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['post.update', $post->post_id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {{ Form::label('post_title', 'Tiêu đề bài viết') }}
                    {{ Form::text('post_title',$post->post_title, ['class' => 'form-control', 'id' => 'post_title']) }}
                    @error('post_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('post_slug', 'Slug') }}
                    {{ Form::text('post_slug', $post->post_slug, ['class' => 'form-control', 'id' => 'post_slug']) }}
                    @error('post_slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('post_images', 'Hình ảnh') }}
                    <br/>
                    {{ Form::file('post_images', ['class' => 'form-control', 'id' => 'post_images','style'=>'display:none;']) }}
                    <label for="post_images"><img src="{{asset('storage/'.$post->post_images)}}" id="post_image_preview" width="150"></label>
                    @error('post_images')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('post_content', 'Nội dung') }}
                    {{ Form::textarea('post_content', $post->post_content, ['class' => 'form-control', 'id' => 'post_content']) }}
                    @error('post_content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('post_status', 'Trạng thái') }}
                    {{ Form::select('post_status', $post_status, $post->post_status, ['class' => 'form-control', 'id' => 'post_status']) }}
                    @error('post_status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('category_post_id', 'Loại bài viết') }}
                    {{ Form::select('category_post_id',$cats, $post->category_post_id , ['class' => 'form-control', 'id' => 'category_post_id']) }}
                </div>

                <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
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
