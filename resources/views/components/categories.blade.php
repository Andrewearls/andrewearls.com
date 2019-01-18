<div id="Categories" class="row no-gutters justify-content-center section">
	@foreach($categories as $category)
	<div class="col-2 category-object not-active">
		<a href="">
			<div class="name">{{ $category->name }}</div>
		</a>
	</div>
	@endforeach
</div>