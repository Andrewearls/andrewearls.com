@extends('layouts.app')

@section('navarea')
	<div class="title">{{$project->name}}</div>
	<ul>
		<li><a href="#Infographic">Infographic</a></li>
		<li><a href="#Description">Description</a></li>
		<li><a href="#Reference">Reference</a></li>
		<li><a href="#Categories">Categories</a></li>
	</ul>
@endsection

@section('content')
{!! Form::open(['url' => 'foo/bar', 'id' => 'cms']) !!}
	<div id="Project" class="container-fluid">
		<div class="title row">
			<div class="col">
				{{ Form::text('projectName', $project->name) }}
			</div>
			
		</div>
		<div class="title row justify-content-between">
			<div class="col">
				{{ Form::label('Infographic:') }}
			</div>
			<div class="col-2">	
				<div class="row no-gutters">			
					<div class="col">Live:</div>
					<div class="col switch"><i class="fas fa-toggle-off"></i></div>	
				</div>	
			</div>
		</div>
		{{ Form::text('url', $project->url) }}		
		@include('components.infographic', ['url' => $project->url])
		<div class="title">
			{{ Form::label('Description:') }}
		</div>
		<div class="container">			
			<div id="Description" class="row justify-content-center">
				
				{{ Form::textarea('descripton', $project->description) }}
				
			</div>
		</div>
		<div class="title">
			{{ Form::label('References:') }}
		</div>
		{{ Form::text('reference', '') }}
		@include('components.reference')
		<div class="title">
			{{ Form::label('Categories:') }}
		</div>
		{{ Form::text('categories', '') }}
		@include('components.categories')
	</div>
{!! Form::close() !!}	
@endsection

@section('scripts')
<script type="text/javascript">
	function clean_string(string) {
		// Remove trailing spaces
		clean = $.trim(string);
		// Return clean string
		return clean;
	};
	$(document).ready(function () {
		$('[name="projectName"]').change(function () {
			//clean the input
			clean = clean_string($(this).val());
			//place clean string in the input
			$(this).val(clean);
			//Chage the navarea Title
			$('.nav-area').find('.title').text(clean);
		})
		$('[name="url"]').change(function() {
			//clean the input
			clean = clean_string($(this).val());
			//place clean string in the input
			$(this).val(clean);
			//load new ifram url
			$('#Infographic').find('iframe').prop('src', clean);
		})
		$('[name="reference"]').change(function () {
			//clean the input
			clean = clean_string($(this).val());
			//remove the val from the input
			$(this).val('');
			//create a new reference object
			newObj = $('#Reference').find('.hidden').clone();
			// alert($(newObj).find('a').text());
			//replace text with clean input
			$(newObj).find('.name').text(clean);
			//add new reference to the end of the list
			$(newObj).appendTo('#Reference');
			//remove hidden class from new reference
			$(newObj).removeClass('hidden');
		})
		$('[name="categories"').change(function () {
			//clean the input
			clean = clean_string($(this).val());
			//remove the val from the input
			$(this).val('');
			//create a new category object
			newObj = $('#Categories').find('.hidden').clone();
			// alert($(newObj).find('a').text());
			//replace text with clean input
			$(newObj).find('.name').text(clean);
			//add new category to the end of the list
			$(newObj).appendTo('#Categories');
			//remove hidden class from new category
			$(newObj).removeClass('hidden');
		})		
		$('.switch').click(function () {
			$(this).find('.fas').toggleClass('fa-toggle-off fa-toggle-on')
		})
		$('#Reference').on('click', 'a', function (e) {
			e.preventDefault();
			$(this).closest('.reference-object').remove();
		});
		$('#Categories').on('click', 'a', function (e) {
			e.preventDefault();
			$(this).closest('.category-object').remove();
		})
	});
	
</script>
@endsection