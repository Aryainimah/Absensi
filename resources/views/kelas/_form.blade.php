<div class="form-group{{ $errors->has('id_jurusan') ? 'has-error' : '' }}">
	{!! Form::label('id_jurusan','Jurusan :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('id_jurusan',App\jurusans::pluck('nama_jur','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Jurusan']) !!}
		{!! $errors->first('nama_jur', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama_kelas') ? 'has-error' : '' }}">
	{!! Form::label('nama_kelas','Nama Kelas :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_kelas',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama_kelas', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('walikelas') ? 'has-error' : '' }}">
	{!! Form::label('walikelas','Wali Kelas :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('walikelas',null,['class'=>'form-control']) !!}
		{!! $errors->first('walikelas', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>