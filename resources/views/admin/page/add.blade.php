@extends('layouts.admin')
@section('title', 'Thêm trang')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm trang
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'page.store']) !!}
                <div class="form-group">
                    {{ Form::label('page_title', 'Tiêu đề') }}
                    {{ Form::text('page_title', old('page_title'), ['class' => 'form-control', 'id' => 'page_title']) }}
                    @error('page_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">

                    {{ Form::label('page_slug', 'Slug') }}
                    {{ Form::text('page_slug', old('page_slug'), ['class' => 'form-control', 'id' => 'page_slug']) }}
                    @error('page_slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('page_content', 'Nội dung') }}
                    {{ Form::textarea('page_content', old('page_content'), ['class' => 'form-control', 'id' => 'page_content']) }}
                </div>



                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
