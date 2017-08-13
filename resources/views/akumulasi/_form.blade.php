<div class="form-group{{ $errors->has('id_siswa') ? 'has-error' : '' }}">
	{!! Form::label('id_siswa','Siswa :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('id_siswa',App\siswa::pluck('nama_siswa','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Siswa']) !!}
		{!! $errors->first('nama_siswa', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('keterangan') ? 'has-error' : '' }}">
	{!! Form::label('keterangan','Keterangan :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('keterangan',null,['class'=>'form-control']) !!}
		{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tgl') ? 'has-error' : '' }}">
	{!! Form::label('tgl','Tanggal :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::date('tgl',null,['class'=>'form-control']) !!}
		{!! $errors->first('tgl', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>