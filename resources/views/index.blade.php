@extends('layouts.master')

@section('body')
    <div class="text-center">
        <div class="row">
            <div class="col-md-6">
                <h3>Bills</h3>
                <a href="{{ route('bills.create') }}">Create Bill</a>
            </div>
            <div class="col-md-6">
                <h3>Expenses</h3>
            </div>
        </div>
    </div>
@endsection