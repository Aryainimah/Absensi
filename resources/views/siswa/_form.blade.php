<div class="form-group{{ $errors->has('id_ortu') ? 'has-error' : '' }}">
	{!! Form::label('id_ortu','Orang Tua :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('id_ortu',App\Orangtuas::pluck('nama_ortu','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Orang Tua']) !!}
		{!! $errors->first('nama_ortu', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nama_siswa') ? 'has-error' : '' }}">
	{!! Form::label('nama_siswa','Nama Siswa :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_siswa',null,['class'=>'form-control']) !!}
		{!! $errors->first('nama_siswa', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('id_kelas') ? 'has-error' : '' }}">
	{!! Form::label('id_kelas','Kelas :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('id_kelas',App\kelas::pluck('nama_kelas','id')->all(),null,['class'=>'js-selectize','placeholder'=>'Pilih Kelas']) !!}
		{!! $errors->first('nama_kelas', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nis') ? 'has-error' : '' }}">
	{!! Form::label('nis','NIS :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nis',null,['class'=>'form-control']) !!}
		{!! $errors->first('nis', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('alamat') ? 'has-error' : '' }}">
	{!! Form::label('alamat','Alamat :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::textarea('alamat',null,['class'=>'form-control']) !!}
		{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('no_hp') ? 'has-error' : '' }}">
	{!! Form::label('no_hp','No Hp :',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_hp',null,['class'=>'form-control']) !!}
		{!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>