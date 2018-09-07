<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name', ['class' => 'sr-only']) !!}
    {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    <span>Name</span>
    @if ($errors->has('name'))<p class="help-block">{{ $errors->first('name')}}</p> @endif
</div>

<div class="form-group @if ($errors->has('amount')) has-error @endif">
    {!! Form::label('amount', 'Amount', ['class' => 'sr-only']) !!}
    {!! Form::text('amount', $value = null, ['class' => 'form-control', 'placeholder' => 'Amount']) !!}
    <span>Amount</span>
    @if ($errors->has('amount'))<p class="help-block">{{ $errors->first('amount')}}</p> @endif
</div>

<div class="form-group @if ($errors->has('due_date')) has-error @endif">
    {!! Form::label('due_date', 'Due Date', ['class' => 'sr-only']) !!}
    {!! Form::text('due_date', $value = null, ['class' => 'form-control', 'placeholder' => 'Due Date']) !!}
    <span>Due Date</span>
    @if ($errors->has('due_date'))<p class="help-block">{{ $errors->first('due_date')}}</p> @endif
</div>