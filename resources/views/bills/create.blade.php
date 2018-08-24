@extends('layouts.master')

@section('page-title')
    <h3>Create Bill</h3>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            {{ Form::open(array('route' => 'bills.store')) }}
                @include('bills.partials.form')

                {!! Form::submit('Create', ['class' => 'btn btn-primary'] ) !!}
                <a href="{{ URL::previous() }}">Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection