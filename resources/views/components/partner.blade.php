<div id="partner" class="row no-gutters justify-content-center section underline">
	@foreach($partners as $partner)
	<div class="col-2 partner-object">
		<a href="">
			<div>
				<img src="{{ $partner->image }}"><span class="name">{{ $partner->name }}</span>
			</div>
		</a>
	</div>
	@endforeach
</div>