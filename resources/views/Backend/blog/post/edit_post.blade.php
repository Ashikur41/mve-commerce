@extends('admin.admin_dashboard')



@section('main-content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center m b-3">
					<div class="breadcrumb-title pe-3">Edit Blog Post</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Blog Post</li>
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
                                        <form id="myForm" method="post" action="{{ route('update.blog.post',$editBlogPost->id) }}" enctype="multipart/form-data">
                                            @csrf

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Blog Category Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
                                                <select class="form-select" id="category_id" name="category_id">
                                                    <option selected disabled>Blog Category Name</option>
                                                    @foreach ($blogCategories as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $editBlogPost->category_id ? 'selected' : '' }}>{{ $item->blog_category_name }}</option>
                                                    @endforeach
                                                  </select>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Post Title</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="post_title" value="{{$editBlogPost->post_title}}"/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Post Short Description</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<textarea class="form-control" name="post_short_description" id="post_short_description" rows="3">{{$editBlogPost->post_short_description}}</textarea>
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Post Long Description</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<textarea class="form-control" name="post_long_description" id="post_long_description" rows="3">{{$editBlogPost->post_long_description}}</textarea>
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Post Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control" name="post_image" id="image"/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<img id="showImage" src="{{ asset('upload/blog_post/'.$editBlogPost->post_image) }}" alt="category" style="width: 100px; hight:100px;">
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
                        category_id:{
                            required:true,
                        },
                        post_title:{
                            required:true,
                        },
                        post_short_description:{
                            required:true,
                        },
                    },
                    messages:{
                        category_id:{
                            required:'Please Enter Blog Category Name',
                        },
                        post_title:{
                            required:'Please Enter Post Title',
                        },
                        post_short_description:{
                            required:'Please Enter Short Description',
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
