@extends('layouts.main.layout')
@section('title', 'Users')
@section('page-styles')
<link rel="stylesheet" href="/assets/remark/global/vendor/footable/footable.css">
@endsection
@section('pageHeading', 'Users List')
@section('content')

    <div class="col-lg-12">
        <!-- Panel Filtering -->
        <div class="panel">
            <header class="panel-heading">
                <a href="{{route('admin.users.create')}}" class="btn btn-success pull-right" style="margin-top:10px;margin-right:30px;">
                    <i class="icon wb-user-add" aria-hidden="true"></i> Create User</a>
                <h3 class="panel-title">Users</h3>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering">
                    <thead>
                    <tr>
                        <th data-toggle="true">Name</th>
                        <th data-hide="phone, tablet">Email</th>
                        <th data-hide="phone, tablet">Created</th>
                        <th data-hide="phone, tablet">Options</th>
                    </tr>
                    </thead>
                    <div class="form-inline padding-bottom-15">
                        <div class="row">
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Status</label>--}}
                                    {{--<select id="filteringStatus" class="form-control">--}}
                                        {{--<option value="">Show all</option>--}}
                                        {{--<option value="active">Active</option>--}}
                                        {{--<option value="disabled">Disabled</option>--}}
                                        {{--<option value="suspended">Suspended</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-sm-6 pull-right text-right">
                                <div class="form-group">
                                    <input id="filteringSearch" type="text" placeholder="Search" class="form-control"
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info btn-sm" style="text-decoration: none;"><i class="icon wb-edit" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="text-right">
                                <ul class="pagination"></ul>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- End Panel Filtering -->
    </div>

@endsection

@section('page-scripts')
    <script src="/assets/remark/global/vendor/footable/footable.all.min.js"></script>
    <script src="/assets/remark/base/assets/examples/js/tables/footable.js"></script>
@endsection