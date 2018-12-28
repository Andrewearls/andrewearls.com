@extends('layouts.app')

@section('navarea')

    <div class="title">Project List</div>
    <ul>
        <!-- Start foreach Project -->
        <li><a href="">Project Name</a></li>
        <!-- End Foreach -->
    </ul>

@endsection

@section('content')
<div class="container-fluid">
<!-- Start Foreach Category -->
    <div class="row justify-content-center">
        <div class="col-2 order-sm-last category-container">
            <div class="category-title-wrapper">
                <a class="title" href="#">Category Name</a>
            </div>
        </div>
        <div class="col-10 project-container">
            <!-- Start Foreach Project -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Project Name</div>

                        <div class="card-body">
                            <!-- The Project image goes here -->
                            <img src="">
                        </div>

                        <div class="card-footer">
                            <img src=""> <a href="#">Reference</a>
                        </div>
                    </div>
                </div>
            <!-- End Foreach Project -->
        </div>
    </div>
<!-- End Foreach Category -->
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

        function center_title() {
            $child = $('.category-title-wrapper');
            $parent = $child.parent();

            $child.css("position","absolute");
            $child.css("top", (($parent.height() - $child.outerWidth()) / 2) + $parent.scrollTop() + "px");
            $child.css("left", (($parent.width() - $child.outerHeight()) / 2) + $parent.scrollLeft() + "px");
        }

        $(document).ready(function() {
            center_title();
        });

        $(window).resize(function(){
            // alert('changed size');
            center_title();
        });
    </script>
@endsection