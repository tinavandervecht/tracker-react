@extends('layouts.master')

@section('body')
    @include('layouts.partials.success-alert')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Upcoming Bills</h2>
                    <div id="bills-list" data-bills="{{ json_encode($upcomingBills) }}" data-list-type="minimalist"></div>
                </div>
            </div>
        </div>
    </div>
@endsection