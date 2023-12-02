@extends('layouts.admin')
@section('title', 'Cập nhật khách hàng')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật khách hàng
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['customer.update', $customer->id],'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Họ và Tên') }}
                    {{ Form::text('name', $customer->name, ['class' => 'form-control', 'id' => 'name']) }}
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Địa chỉ') }}
                    {{ Form::text('address', $customer->address, ['class' => 'form-control', 'id' => 'address']) }}
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', $customer->email, ['class' => 'form-control', 'id' => 'email']) }}
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Phone') }}
                    {{ Form::text('phone', $customer->phone, ['class' => 'form-control', 'id' => 'phone']) }}
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
