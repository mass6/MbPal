@extends('layouts.main.layout')
@section('title', 'Surveys')
@section('page-styles')
    <link rel="stylesheet" href="/assets/remark/global/vendor/footable/footable.css">
@endsection
@section('pageHeading', 'Surveys')
@section('content')

    <div class="col-lg-12">
        <!-- Panel Filtering -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Active Surveys</h3>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering">
                    <thead>
                    <tr>
                        <th data-toggle="true">Survey ID</th>
                        <th>Title</th>
                        <th data-hide="phone, tablet">Start Date</th>
                        <th data-hide="phone, tablet">Expires</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <div class="form-inline padding-bottom-15">
                        <div class="row">
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Status</label>--}}
                                    {{--<select id="filteringStatus" class="form-control">--}}
                                        {{--<option value="">Show all</option>--}}
                                        {{--<option value="SG Test">SG Test</option>--}}
                                        {{--<option value="suspended">Expired</option>--}}
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
                    @foreach($activeSurveys as $survey)
                        <tr>
                            <td>{{$survey['sid']}}</td>
                            <td>{{$survey['surveyls_title']}}</td>
                            <td>{{$survey['startdate']}}</td>
                            <td>{{$survey['expires']}}</td>
                            <td>
                                <a href="{{ route('surveys.export', $survey['sid']) }}" class="export-button btn btn-success">Export Data</a>
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
                <button class="block btn btn-success">Block</button>
            </div>
        </div>
        <!-- End Panel Filtering -->
    </div>

@endsection

@section('page-scripts')
    <script src="/assets/remark/global/vendor/footable/footable.all.min.js"></script>
    <script src="/assets/remark/base/assets/examples/js/tables/footable.js"></script>
    <script src="/assets/js/plugins/jquery.blockUI.js"></script>
    <script type="text/javascript">

        // unblock when ajax activity stops
        $(document).ajaxStop($.unblockUI);

        $(document).ready(function() {
            // change message border
            $.blockUI.defaults.message = '<h3>Please wait while your file is prepared...</h3>';

            $('.export-button').click(function() {
                $.blockUI();
            });
        });

    </script>
@endsection