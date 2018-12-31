<div id="Infographic" class="row no-gutters justify-content-center">
	{{Form::input()}}
	<div id="responsive-wrapper" class="embed-responsive embed-responsive-4by3">
		<script type='application/javascript' charset='utf-8'>
		   var iframe = document.createElement('iframe');
		   iframe.classList.add('embed-responsive-item');
		   iframe.src = '{{ $url }}';
		   document.getElementById('responsive-wrapper').appendChild(iframe);		   
		</script>
	</div>
</div>