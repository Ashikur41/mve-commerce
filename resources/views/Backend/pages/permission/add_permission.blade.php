@extends('admin.admin_dashboard')

@section('main-content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center m b-3">
					<div class="breadcrumb-title pe-3">Add Permission</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Permission</li>
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
                                        <form id="myForm" method="post" action="{{ route('store.permission') }}">
                                            @csrf

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Permission Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Group Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<select class="form-select mb-3" aria-label="Default select example" name="group_name">
                                                    <option selected="">Group Name</option>
                                                    <option value="brand">Brand</option>
                                                    <option value="category">Category</option>
                                                    <option value="subcategory">Sub-Category</option>
                                                    <option value="product">Product</option>
                                                    <option value="slider">Slider</option>
                                                    <option value="banner">Banner</option>
                                                    <option value="coupon">Coupon</option>
                                                    <option value="vendor">Vendor</option>
                                                    <option value="order">Order</option>
                                                    <option value="shipping">Shipping</option>
                                                </select>
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

                {{-- form valiedtion  --}}
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#myForm').validate({
                            rules:{
                                name:{
                                    required:true,
                                },
                            },
                            messages:{
                                name:{
                                    required:'Please Enter Permission Name',
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
