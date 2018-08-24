@extends('layouts.master')

@section('page-title')
    <h3>Create Bill</h3>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            {{ Form::model($bill, array('url' => route('bills.update', $bill->id), 'method' => 'PATCH')) }}
                @include('bills.partials.form')

                {!! Form::submit('Update', ['class' => 'btn btn-primary'] ) !!}
            {{ Form::close() }}
        </div>
    </div>
@endsection