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
	}
	$(document).ready(function () {
		$('[name="url"]').change(function() {
			//clean the input
			clean = clean_string($(this).val());
			//place clean string in the input
			$(this).val(clean);
			//load new ifram url
			$('#Infographic').find('iframe').prop('src', clean);
		});
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
		$(document).on('click', '#Reference a', function (event) {
			event.preventDefault();
			$(this).closest('.reference-object').remove();
		})
		$(document).on('click', '#Categories a', (function (event) {
			event.preventDefault();
			$(this).closest('.category-object').remove();
		})
	})
</script>
@endsection