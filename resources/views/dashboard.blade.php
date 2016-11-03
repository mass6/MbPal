@extends('layouts.main.layout')

@section('title', 'Dashboard')
@section('pageHeading', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-6">
        <!-- Widget -->
        <div class="widget">
            <div class="widget-content padding-30 bg-white">
                <div class="counter counter-lg">
                    <div class="counter-label text-uppercase">Active Surveys</div>
                    <div class="counter-number-group">
                  <span class="counter-icon margin-right-10 green-600">
                    <i class="wb-library"></i>
                  </span>
                        <span class="counter-number">{{ $activeSurveysCount }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Widget -->
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- Widget -->
        <div class="widget">
            <div class="widget-content padding-30 bg-white">
                <div class="counter counter-lg">
                    <div class="counter-label text-uppercase">Moves Registrations</div>
                    <div class="counter-number-group">
                  <span class="counter-icon margin-right-10 green-600">
                    <i class="wb-stats-bars"></i>
                  </span>
                        <span class="counter-number">{{ $movesRegistrations }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Widget -->
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- Widget -->
        <div class="widget">
            <div class="widget-content padding-30 bg-white">
                <div class="counter counter-lg">
                    <div class="counter-label text-uppercase">Registrations Today</div>
                    <div class="counter-number-group">
                  <span class="counter-icon margin-right-10 green-600">
                    <i class="wb-graph-up"></i>
                  </span>
                        <span class="counter-number">{{ $movesRegistrationsToday }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Widget -->
    </div>
</div>




@endsection