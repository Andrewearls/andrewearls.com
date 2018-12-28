<?php $description['whole'] = "
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis sapien eu nibh laoreet rhoncus. Vestibulum neque justo, scelerisque vel consequat a, eleifend vel tellus. Sed vel ullamcorper risus. Donec sit amet lectus quam. Nullam gravida ante mi, nec hendrerit nibh viverra a. Fusce varius dolor augue, at elementum leo bibendum vitae. Mauris luctus enim vestibulum tellus convallis, pharetra viverra enim auctor. Cras faucibus lectus elit, eget convallis risus volutpat eget. Pellentesque nunc nibh, faucibus a nisi at, commodo scelerisque nisl. Praesent bibendum erat ac enim convallis gravida. Donec maximus tortor neque, nec accumsan velit pretium vitae. Vivamus sit amet rutrum velit, non scelerisque est. Fusce molestie viverra quam sit amet eleifend. Nam tristique, turpis sit amet lobortis euismod, purus dolor pellentesque velit, non consequat sem urna et massa.

	Sed velit nulla, egestas at posuere non, congue vitae risus. Aliquam tristique condimentum egestas. Vivamus pharetra efficitur erat, fringilla ornare dolor eleifend non. Curabitur pulvinar fringilla ligula, consequat tincidunt nisl rhoncus et. Ut rhoncus commodo lectus quis hendrerit. Quisque porttitor est lacus, eu facilisis ipsum vehicula ut. Phasellus ac ligula metus. Nulla vitae risus vel justo blandit aliquam. Fusce eget lacus venenatis, viverra odio et, dictum nunc. Duis ut ullamcorper lorem. Mauris posuere quam et eleifend volutpat. Suspendisse ullamcorper libero ut tortor malesuada elementum. Nam gravida, turpis ultricies bibendum aliquet, quam metus efficitur eros, ac commodo nulla justo sed sem. Vestibulum lacus dolor, hendrerit sit amet tempus eu, venenatis a nisi.

	Phasellus faucibus eros id erat malesuada aliquam. Vivamus at turpis finibus, tincidunt quam consequat, aliquam nulla. Vestibulum vulputate pretium facilisis. Sed blandit mollis efficitur. Etiam eget malesuada dui, vitae ultricies dui. Etiam feugiat sodales pellentesque. Vestibulum tristique odio et risus imperdiet lobortis sit amet sed mauris. In vitae purus ligula. Suspendisse ac urna consectetur arcu ultricies congue.

	Etiam condimentum vehicula lorem, tempor pharetra dolor congue id. Nullam semper a diam ac molestie. Suspendisse libero sapien, eleifend non faucibus ut, hendrerit sed risus. Aenean ut commodo nibh. Nulla sit amet erat iaculis eros aliquet lobortis. Nunc in orci vel tellus tincidunt faucibus. Nunc dictum justo ac odio euismod aliquet.

	Quisque sit amet aliquam ipsum. Donec pretium neque in mauris semper, vel sagittis erat egestas. Fusce scelerisque, augue et vehicula tempor, ligula leo mollis quam, quis consequat leo libero et enim. Nulla non tempor mi. Nam commodo pellentesque cursus. Sed in tortor enim. Fusce non sem eget ex suscipit luctus nec eget odio. Vestibulum ornare fermentum tortor, at mollis magna ullamcorper ut. Nulla sed auctor nunc.
	" ?>
<?php $description['firstHalf'] = nl2br(substr($description['whole'], 0, strlen($description['whole'])/2)); ?>
<?php $description['secondHalf'] = nl2br(substr($description['whole'], strlen($description['whole'])/2, -1)); ?>

<!-- Descriptions should be delivered in two halves -->
<div class="container">
<div id="Description" class="row justify-content-center">
	<div class="col-6">
		<?php echo $description['firstHalf']; ?>
	</div>
	<div class="col-6">
		<?php echo $description['secondHalf']; ?>
	</div>
</div>
</div>