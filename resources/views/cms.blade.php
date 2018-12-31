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
{!! Form::open(['url' => 'foo/bar', 'id' => 'cms']) !!}
	<div id="Project" class="container-fluid">
		<div class="title">
			{{ Form::label('Infographic:') }}
		</div>
		{{ Form::text('url', 'http://www.dubiousmacrocosm.com') }}		
		@include('components.infographic', ['url' => 'http://www.dubiousmacrocosm.com'])
		<div class="title">
			{{ Form::label('Description:') }}
		</div>
		<div class="container">			
			<div id="Description" class="row justify-content-center">
				
				{{ Form::textarea('descripton') }}
				
			</div>
		</div>
		<div class="title">
			{{ Form::label('References:') }}
		</div>
		{{ Form::text('reference', 'Google') }}
		@include('components.reference')
		<div class="title">
			{{ Form::label('Categories:') }}
		</div>
		{{ Form::text('categories', 'Websites') }}
		@include('components.reference')
	</div>
{!! Form::close() !!}	
@endsection