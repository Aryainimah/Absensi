@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Absensi</a></li>
				<li><a href="{{ url('/admin/ortu') }}">Data Orangt Tua</a></li>
				<li class="active">Ubah Data</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Data</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($orangtuas, ['url'=>route('ortu.update', $orangtuas->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('ortu._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection