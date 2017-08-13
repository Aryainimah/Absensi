<div class="form-group{{ $errors->has('nama_ortu') ? 'has-error' : '' }}">
	{!! Form::label('nama_ortu','Nama Ortu:',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_ortu',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama_ortu', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('alamat') ? 'has-error' : '' }}">
	{!! Form::label('alamat','Alamat:',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::textarea('alamat',null,['class'=>'form-control']) !!}
		{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('no_hp') ? 'has-error' : '' }}">
	{!! Form::label('no_hp','Nomor Hp:',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('no_hp',null,['class'=>'form-control']) !!}
		{!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>