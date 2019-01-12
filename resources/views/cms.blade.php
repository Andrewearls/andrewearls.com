@extends('layouts.app')

@section('navarea')
	<div class="title">{{$project->name}}</div>
	<ul>
		<li><a href="#Infographic">Infographic</a></li>
		<li><a href="#Description">Description</a></li>
		<li><a href="#partner">partner</a></li>
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
{!! Form::open(['url' => route('create_partner'), 'id' => 'cms']) !!}
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
				{{ Form::label('partners:') }}
			</div>
		</div>
		<div class="row no-gutters new-partner-container underline">
			<div class="col-4" id="image-upload-container">
				<div class="row">
					<div class="col">
						{{ Form::file('partner_image_file', ['onchange' => 'show_partner_image(this)']) }}
					</div>
				</div>
				<div class="row">
					<div class="col">
						or
					</div>
				</div>
				<div class="row">
					<div class="col">
						{{ Form::text('partner_image_link', 'link to image') }}
					</div>
				</div>
				
			</div>
			<div class="col-4 hidden" id="partner-image-display">
				<img src="">
			</div>
			<div class="col">
				<div class="row">
					<div class="col">
						{{ Form::text('partner_name', 'partner Name') }}
					</div>
				</div>
				<div class="row">
					<div class="col">
						and
					</div>
				</div>
				<div class="row">
					<div class="col">
						{{ Form::text('partner_url', 'partner Url') }}
					</div>
				</div>
			</div>
			<div class="col-1">				
				<button type="button" class="btn" onclick="submit_partner_data()">Create New partner</button>					
			</div>
		</div>
		@include('components.partner')
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
	
	function store(collected_data, destination, success = function(){console.log('success')}){
		$.ajax({
			method: "POST",
			url: destination,
			data: collected_data,
		}).done(function( msg ) {
			if (msg === 'success') {
				success;
			}
		});
	};
	function submit_project_data() {
		destination = '{!! route('update_project', ['id' => $project->id]) !!}';
		data = {
			_token: "{!! csrf_token() !!}",
			name: $('[name="name"]').val(),
			url: $('[name="url"]').val(),
			description: $('[name="description"]').val(),
			live: live,
		}

		store(data, destination);
	}
	function get_partner_image() {
		image = $('#partner-image-display img').attr('src');
		return image;
	}
	function clear_partner_form() {
		$('[name="partner_name"]').val('');
		$('[name="partner_url"]').val('');
		$('[name="partner_image_link"]').val('');
		$('[name="partner_image_file"]').val('');
		if ($('#partner-image-display img').attr('src') != '' ) {
			hide_partner_image();
		}
	}
	function make_partner_element(data) {
		//clean the input
		// clean = clean_string($(this).val());

		//remove the val from the input
		clear_partner_form();
		//create a new partner object
		newObj = $('#partner').find('.hidden').clone();
		//replace object text with clean input
		$(newObj).find('.name').text(data['name']);
		//replace object image with new image
		$(newObj).find('img').attr('src', data['image']);
		//replace object link with new link
		$(newObj).find('a').attr('href', data['url']);
		//add new partner to the end of the list
		$(newObj).appendTo('#partner');
		//add active class
		$(newObj).addClass('active');
		//remove hidden class from new partner
		$(newObj).removeClass('hidden');
		
	}
	function submit_partner_data() {
		destination = '{!! route('create_partner') !!}'
		data = {
			_token: "{!! csrf_token() !!}",
			name: $('[name="partner_name"]').val(),
			url: $('[name="partner_url"]').val(),
			image: get_partner_image(),
		}

		success = make_partner_element(data);
		store(data, destination, success);
	}
	function show_partner_image(input) {	    

		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function (e) {
		      	$('#partner-image-display')
		      		.find('img')
			        .attr('src', e.target.result);
			    $('#image-upload-container').addClass('hidden');
				$('#partner-image-display').removeClass('hidden');
				$('[name="partner_image_link"]').val('');
		    };
		    reader.readAsDataURL(input.files[0]);		    
		}
	}
	function hide_partner_image() {
		$('#partner-image-display').addClass('hidden');
		$('#partner-image-display img').attr('src', '');
		$('#image-upload-container').removeClass('hidden');
		$('[name="partner_image_file').val('');
	}
	function new_category_object(categoryName) {
		//create a new category object
		newObj = $('#Categories').find('.hidden').clone();
		//replace text with clean input
		$(newObj).find('.name').text(categoryName);
		//add new category to the end of the list
		$(newObj).appendTo('#Categories');
		//add class active
		$(newObj).addClass('active');
		//remove hidden class from new category
		$(newObj).removeClass('hidden');
	}
	function submit_category_data(categoryName) {
		destination = '{!! route("create_category") !!}';
		data = {
			_token: "{!! csrf_token() !!}",
			name: categoryName,
		}
		success = new_category_object(categoryName);
		store(data, destination,success);
	}
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
		
		$('[name="categories"').change(function () {
			//clean the input
			clean = clean_string($(this).val());
			//submit the input
			submit_category_data(clean);

			//remove the val from the input
			$(this).val('');
			
		})		
		$('.switch').click(function () {
			$(this).find('.fas').toggleClass('fa-toggle-off fa-toggle-on')
			live = !live ? 1 : 0;
			submit_project_data();
		})
		$('#partner').on('click', 'a', function (e) {
			e.preventDefault();
			$(this).closest('.partner-object').toggleClass('active not-active');
		});
		$('#partner-image-display img').click( function () {
			hide_partner_image();
		})
		$('[name="partner_image_link').change(function () {
			$('#partner-image-display')
		      		.find('img')
			        .attr('src', $(this).val());
			$('[name="partner_image_file').val('');
		    $('#image-upload-container').addClass('hidden');
			$('#partner-image-display').removeClass('hidden');
		})
		
		$('#Categories').on('click', 'a', function (e) {
			e.preventDefault();
			$(this).closest('.category-object').toggleClass('active not-active');
		})
	});
	
</script>
@endsection