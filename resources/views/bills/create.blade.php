@extends('layouts.master')

@section('page-title')
    <h3>Create Bill</h3>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <h1 class="m-t-0 m-b-1">Create Bill</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(array('route' => 'bills.store')) }}
                        @include('bills.partials.form')

                        <div class="text-right">
                            <a href="{{ URL::previous() }}" class="m-r-1">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection