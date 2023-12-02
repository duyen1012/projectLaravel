@extends('layouts.admin')
@section('title', 'Thêm slider')
@section('content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm slider
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'slider.store', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {{ Form::label('slider_image', 'Ảnh') }}
                {{ Form::file('slider_image', ['class' => 'form-control' , 'id' => 'slider_image'])}}
                </div>

                <div class="form-group">
                    {{ Form::label('slider_title', 'Tiêu đề') }}
                    {{ Form::text('slider_title', old('slider_title'), ['class' => 'form-control', 'id' => 'slider_title']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('slider_desc', 'Mô tả') }}
                    {{ Form::text('slider_desc', old('slider_desc'), ['class' => 'form-control', 'id' => 'slider_desc']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('slider_url', 'Link') }}
                    {{ Form::text('slider_url', old('slider_url'), ['class' => 'form-control', 'id' => 'slider_url']) }}
                </div>

                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
