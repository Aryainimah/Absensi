@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Abesnsi</a></li>
				<li><a href="{{ url('/admin/absensi') }}">Data absensi</a></li>
				<li class="active">Ubah absensi</li>
			</ul>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah absensi</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($absensi, ['url'=>route('absensi.update', $absensi->id), 'method'=>'put', 'files'=>'true','class'=>'form-horizontal']) !!}
					@include('absensi._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection