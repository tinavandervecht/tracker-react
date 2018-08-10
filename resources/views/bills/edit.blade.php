@extends('layouts.master')

@section('page-title')
    <h3>Create Bill</h3>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            {{ Form::model($bill, array('url' => route('bills.update', $bill->id), 'method' => 'PATCH')) }}
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))<p class="help-block">{{ $errors->first('name')}}</p> @endif
                </div>

                <div class="form-group @if ($errors->has('amount')) has-error @endif">
                    {!! Form::label('amount', 'Amount') !!}
                    {!! Form::text('amount', $value = null, ['class' => 'form-control']) !!}
                    @if ($errors->has('amount'))<p class="help-block">{{ $errors->first('amount')}}</p> @endif
                </div>

                <div class="form-group @if ($errors->has('due_date')) has-error @endif">
                    {!! Form::label('due_date', 'Due Date') !!}
                    {!! Form::date('due_date', $value = null, ['class' => 'form-control']) !!}
                    @if ($errors->has('due_date'))<p class="help-block">{{ $errors->first('due_date')}}</p> @endif
                </div>

                {!! Form::submit('Create', ['class' => 'btn btn-primary'] ) !!}
            {{ Form::close() }}
        </div>
    </div>
@endsection