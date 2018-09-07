@extends('layouts.master')

@section('page-title')
    <h3>Create Bill</h3>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <h1 class="m-t-0 m-b-1">Edit Bill</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::model($bill, array('url' => route('bills.update', $bill->id), 'method' => 'PATCH')) }}
                        @include('bills.partials.form')

                        <div class="text-right">
                            <a href="{{ URL::previous() }}" class="m-r-1">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection