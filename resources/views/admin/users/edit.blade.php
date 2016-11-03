@extends('layouts.main.layout')
@section('title', 'Edit User')
@section('pageHeading', 'Edit User')
@section('content')

    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-sm-6">
                    <!-- Example Basic Form -->
                    <div class="example-wrap">
                        <h4 class="example-title">Edit User</h4>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="example">
                            {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PATCH']) !!}
                                <div class="form-group">
                                    <label class="control-label" for="inputName">Name</label>
                                    {!! Form::text('name', null,
                                    [
                                        'class' => 'form-control',
                                        'id' => 'inputName',
                                        'placeholder' => 'Name',
                                        'autocomplete' => 'off',
                                        'required'
                                        ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputBasicEmail">Email Address</label>
                                    {!! Form::email('email', null,
                                    [
                                        'class' => 'form-control',
                                        'id' => 'inputEmail',
                                        'placeholder' => 'Email Address',
                                        'autocomplete' => 'off',
                                        'required'
                                        ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputBasicPassword">Password</label>
                                    {!! Form::password('password',
                                   [
                                       'class' => 'form-control',
                                       'id' => 'inputPassword',
                                       'placeholder' => 'Password',
                                       'autocomplete' => 'off',
                                       ]) !!}
                                    <span class="text text-warning">Leave blank if no change</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE', 'class' => 'inline']) !!}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="icon wb-trash" aria-hidden="true"></i> Delete User</button>
                                </div>
                        </div>
                    </div>
                    <!-- End Example Basic Form -->
                </div>
            </div>
        </div>
    </div>

@endsection