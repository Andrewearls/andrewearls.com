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
		<div id="Infographic" class="row no-gutters justify-content-center">
			<!-- Infographic image here -->
			<img src="https://via.placeholder.com/300">
		</div>
		<div id="Description" class="row no-gutters justify-content-center">
			<p>
				Description
			</p>
		</div>
		<div id="Reference" class="row no-gutters justify-content-center">
			<!-- Reference Image -->
			<a href="#">
				<img src="https://via.placeholder.com/150">Reference Name
			</a>
		</div>
		<div id="Downloads" class="row no-gutters justify-content-center">
			<a href="#"><img src="https://via.placeholder.com/50">Link</a>
		</div>
	</div>
@endsection