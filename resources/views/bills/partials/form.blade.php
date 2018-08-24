<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))<p class="help-block">{{ $errors->first('name')}}</p> @endif
</div>

<div class="form-group @if ($errors->has('amount')) has-error @endif">
    {!! Form::label('amount', 'Amount') !!}
    {!! Form::number('amount', $value = null, ['class' => 'form-control', 'min' => 0]) !!}
    @if ($errors->has('amount'))<p class="help-block">{{ $errors->first('amount')}}</p> @endif
</div>

<div class="form-group @if ($errors->has('due_date')) has-error @endif">
    {!! Form::label('due_date', 'Due Date (Day of the month the bill is due)') !!}
    {!! Form::number('due_date', $value = null, ['class' => 'form-control', 'min' => 0]) !!}
    @if ($errors->has('due_date'))<p class="help-block">{{ $errors->first('due_date')}}</p> @endif
</div>