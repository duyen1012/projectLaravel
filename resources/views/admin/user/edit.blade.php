@extends('layouts.admin')
@section('title', 'Cập nhật người dùng')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa người dùng
        </div>
        <div class="card-body">
            {!! Form::open(['route' => ['user.update', $user->id]]) !!}
            <div class="form-group">

                {{ Form::label('name', 'Họ và tên') }}
                {{ Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name']) }}
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">

                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', $user->email, ['class' => 'form-control', 'id' => 'email', 'readonly' => 'readonly']) }}
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('roles', 'Roles') }}
                @php
                    $selectedRoles = $user->roles->pluck('id')->toArray();
                    $options = $roles->pluck('name','id')->toArray();
                @endphp
                {{ Form::select('roles[]', $options, $selectedRoles, ['id' => 'roles', 'class'=>'form-control' ,'multiple' => true]) }}
            </div>
            <button type="submit" name="btn-update" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection

