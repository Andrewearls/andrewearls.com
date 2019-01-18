@extends('layouts.app')

@section('navarea')
	<div class="title">Categories</div>
	<ul>
		@foreach($categories as $category)
			<li><a href="{{ $category->id }}">{{$category->name}}</a></li>
		@endforeach
		
	</ul>
@endsection

@section('content')

@endsection

@section('scripts')

@endsection