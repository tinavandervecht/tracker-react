@extends('layouts.master')

@section('page-title')
    <h3>All Bills</h3>
@endsection

@section('body')
    <ul class="list-inline">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li>|</li>
        <li><a href="{{ route('bills.create') }}">Create Bill</a></li>
    </ul>
    <div id="bills-list" data-bills="{{ json_encode($bills) }}"></div>
@endsection