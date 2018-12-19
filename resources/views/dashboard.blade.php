@extends('layouts.app')

@section('content')
<!-- Start Foreach Category -->
    <div class="row justify-content-center">
        <div class="col-3 order-sm-last">
            <a href="#">Category Name</a>
        </div>
        <div class="col-9">
            <!-- Start Foreach Project -->
                <div class="col-3">
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
@endsection
