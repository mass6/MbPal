@extends('layouts.main.layout')
@section('title', 'Create User')
@section('pageHeading', 'Create New User')
@section('content')

    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-sm-6">
                    <!-- Example Basic Form -->
                    <div class="example-wrap">
                        <h4 class="example-title">New User</h4>
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
                            {!! Form::open(['route' => 'admin.users.store']) !!}
                                <div class="form-group">
                                    <label class="control-label" for="inputBasicFirstName">Name</label>
                                    <input type="text" class="form-control" id="inputBasicFirstName" name="name"
                                           placeholder="First Name" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputBasicEmail">Email Address</label>
                                    <input type="email" class="form-control" id="inputBasicEmail" name="email"
                                           placeholder="Email Address" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputBasicPassword">Password</label>
                                    <input type="password" class="form-control" id="inputBasicPassword" name="password"
                                           placeholder="Password" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- End Example Basic Form -->
                </div>
            </div>
        </div>
    </div>

@endsection