@extends('admin.admin_dashboard')



@section('main-content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center m b-3">
					<div class="breadcrumb-title pe-3">Add Slider</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Slider</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-10">
								<div class="card">
									<div class="card-body">
                                        <form id="myForm" method="post" action="{{ route('store.slider') }}" enctype="multipart/form-data">
                                            @csrf

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Title</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="slider_title" />
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Short Title</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="short_title" />
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control" name="slider_image" id="image"/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin" style="width: 100px; hight:100px;">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes"/>
											</div>
										</div>
                                    </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->

        {{-- image show --}}
        <script>
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
        {{-- form valiedtion  --}}
        <script type="text/javascript">
            $(document).ready(function(){
                $('#myForm').validate({
                    rules:{
                        slider_title:{
                            required:true,
                        },
                        short_title:{
                            required:true,
                        },
                        slider_image:{
                            required:true,
                        },
                    },
                    messages:{
                        slider_title:{
                            required:'Please Enter Slider Title',
                        },
                        short_title:{
                            required:'Please Enter Slider Short Title',
                        },
                        slider_image:{
                            required:'Please Enter Slider Image',
                        },
                    },
                    errorElement:'span',
                    errorPlacement:function(error,element){
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight:function(element,errorClass,validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight:function(element,errorClass,validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });

        </script>
@endsection
