@extends('layouts.master')

@section('body')
    <div class="row">
        <div class="col-md-6 col-md-push-3 centered-item-parent">
            <div class="panel panel-default auth-card">
                <div class="panel-body">
                    <div class="overview">
                        <h1 class="text-center">Login</h1>
                        <p class="text-center">
                            Don't have an account? <a href="{{ route('register') }}">Click here to register.</a>
                        </p>
                    </div>
                    {{ Form::open(array('route' => 'login', 'class' => 'disable-on-submit')) }}
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            {!! Form::label('email', 'Email', ['class' => 'sr-only']) !!}
                            {!! Form::text('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            <span>Email</span>
                            @if ($errors->has('email'))<p class="help-block">{{ $errors->first('email')}}</p> @endif
                        </div>
                        <div class="form-group @if ($errors->has('password')) has-error @endif">
                            {!! Form::label('password', 'Password', ['class' => 'sr-only']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            <span>Password</span>
                            @if ($errors->has('password'))<p class="help-block">{{ $errors->first('password')}}</p> @endif
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection