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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['url' => route('update_project', ['id' => $project->id]), 'id' => 'cms']) !!}
	<div id="Project" class="container">
		<div class="title row">
			<div class="col">
				{{ Form::text('name', $project->name) }}
			</div>
			
		</div>
		<div class="title row justify-content-between">
			<div class="col">
				{{ Form::label('Infographic:') }}
			</div>
			<div class="col-2">	
				<div class="row no-gutters">			
					<div class="col">Live:</div>
					@if($project->live)
						<div class="col switch"><i class="fas fa-toggle-on"></i></div>	
					@else
						<div class="col switch"><i class="fas fa-toggle-off"></i></div>	
					@endif
				</div>	
			</div>
		</div>
		{{ Form::text('url', $project->url) }}		
		@include('components.infographic', ['url' => $project->url])
		<div class="title">
			{{ Form::label('Description:') }}
		</div>
				
		<div id="Description" class="row no-gutters justify-content-center section underline">
			<div class="col"> 
				{{ Form::textarea('description', $project->description) }}
			</div>			
		</div>
		
		<div class="title row">
			<div class="col">
				{{ Form::label('References:') }}
			</div>
		</div>
		<div class="row no-gutters new-reference-container underline">
			<div class="col-4 image-upload-container">
				<div class="row">
					<div class="col">
						{{ Form::file('reference_image_file') }}
					</div>
				</div>
				<div class="row">
					<div class="col">
						or
					</div>
				</div>
				<div class="row">
					<div class="col">
						{{ Form::text('reference_image_link', 'link to image') }}
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col">
						{{ Form::text('reference_name', 'Reference Name') }}
					</div>
				</div>
				<div class="row">
					<div class="col">
						and
					</div>
				</div>
				<div class="row">
					<div class="col">
						{{ Form::text('reference_url', 'Reference Url') }}
					</div>
				</div>
			</div>
			<div class="col-1">				
				<button type="button" class="btn">Create New Resource</button>					
			</div>
		</div>
		@include('components.reference')
		<div class="title row">
			<div class="col">
				{{ Form::label('Categories:') }}
			</div>
		</div>
		<div class="row no-gutters underline">
			<div class="col">
				{{ Form::text('categories', 'New Category Name') }}
			</div>
		</div>
		@include('components.categories')
	</div>
{!! Form::close() !!}	
@endsection

@section('scripts')
<script type="text/javascript">
	live = {!! $project->live !!}
	function submit_project_data() {
		data = {
			_token: "{!! csrf_token() !!}",
			name: $('[name="name"]').val(),
			url: $('[name="url"]').val(),
			description: $('[name="description"]').val(),
			live: live,
		}

		update(data);
	}
	function update(collected_data){
		$.ajax({
			method: "POST",
			url: '{!! route('update_project', ['id' => $project->id]) !!}',
			data: collected_data,

		}).done(function( msg ) {
			// console.log(msg);
		});
	};
	function clean_string(string) {
		// Remove trailing spaces
		clean = $.trim(string);
		// Return clean string
		return clean;
	};
	$(document).ready(function () {
		$('[name="name"]').change(function () {
			//clean the input
			clean = clean_string($(this).val());
			//place clean string in the input
			$(this).val(clean);
			//Chage the navarea Title
			$('.nav-area').find('.title').text(clean);
			submit_project_data();
		})
		$('[name="url"]').change(function() {
			//clean the input
			clean = clean_string($(this).val());
			//place clean string in the input
			$(this).val(clean);
			//load new ifram url
			$('#Infographic').find('iframe').prop('src', clean);
			submit_project_data();
		})
		$('[name="reference_name"]').change(function () {
			//clean the input
			clean = clean_string($(this).val());

			//remove the val from the input
			$(this).val('');
			//create a new reference object
			newObj = $('#Reference').find('.hidden').clone();
			//replace object text with clean input
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
			live = !live ? 1 : 0;
			submit_project_data();
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