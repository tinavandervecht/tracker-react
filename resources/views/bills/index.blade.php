@extends('layouts.master')

@section('page-title')
    <h3>All Bills</h3>
@endsection

@section('body')
    <a href="{{ route('home') }}">Home</a>
    <div id="bills-list" data-bills="{{ json_encode($bills) }}"></div>
@endsection