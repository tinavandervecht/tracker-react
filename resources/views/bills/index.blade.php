@extends('layouts.master')

@section('page-title')
    <h3>All Bills</h3>
@endsection

@section('body')
    <div class="row m-b-1">
        <div class="col-md-8">
            <h1 class="m-t-0">Manage Bills</h1>
        </div>
        <div class="col-md-4 text-right">
            <a class="btn btn-primary" href="{{ route('bills.create') }}">Create Bill</a>
        </div>
    </div>
    @include('layouts.partials.success-alert')
    <div id="bills-list" data-bills="{{ json_encode($bills) }}"></div>
@endsection