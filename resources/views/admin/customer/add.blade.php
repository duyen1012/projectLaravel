@extends('layouts.admin')
@section('title', 'Thêm khách hàng')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm khách hàng
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'customer.store']) !!}
                <div class="form-group">
                 {{ Form::label('name', 'Họ và Tên') }}
                 {{ Form::text('name', old('name'), ['class' => 'form-control' , 'id' => 'name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Địa chỉ') }}
                    {{ Form::text('address', old('address'), ['class' => 'form-control' , 'id' => 'address']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', old('email'), ['class' => 'form-control' , 'id' => 'email']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Phone') }}
                    {{ Form::text('phone', old('phone'), ['class' => 'form-control' , 'id' => 'phone']) }}
                </div>

                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection
