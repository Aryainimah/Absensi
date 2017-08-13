@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Abesnsi</a></li>
				<li><a href="{{ url('/admin/kelas') }}">Data Kelas</a></li>
				<li class="active">Ubah Kelas</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Kelas</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($kelas, ['url'=>route('kelas.update', $kelas->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
					@include('kelas._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection