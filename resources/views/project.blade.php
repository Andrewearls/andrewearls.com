@extends('layouts.app')

@section('navarea')
	<div class="title">Project Name</div>
	<ul>
		<li><a href="#Infographic">Infographic</a></li>
		<li><a href="#Description">Description</a></li>
		<li><a href="#Reference">Reference</a></li>
		<li><a href="#Downloads">Downloads</a></li>
	</ul>
@endsection

@section('content')
	<div id="Project" class="container-fluid">
		@include('components.infographic', ['url' => ''])
		@include('components.description')
		@include('components.reference')
		@include('components.download')		
	</div>
@endsection