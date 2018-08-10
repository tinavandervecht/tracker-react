@extends('layouts.master')

@section('body')
    <div class="text-center">
        <div class="row">
            <div class="col-md-6">
                <h3>Upcoming Bills</h3>
                <a class="btn btn-link" href="{{ route('bills.index') }}">View all Bills</a>
                <a class="btn btn-link" href="{{ route('bills.create') }}">Create Bill</a>
                <div id="bills-list" data-bills="{{ json_encode($upcomingBills) }}" data-list-type="minimalist"></div>
            </div>
            <div class="col-md-6">
                <h3>Expenses</h3>
            </div>
        </div>
    </div>
@endsection