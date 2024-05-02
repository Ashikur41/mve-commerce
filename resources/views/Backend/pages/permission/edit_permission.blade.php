@extends('admin.admin_dashboard')

@section('main-content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center m b-3">
					<div class="breadcrumb-title pe-3">Edit Permission</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
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
                                        <form id="myForm" method="post" action="{{ route('update.permission',$permission->id) }}">
                                            @csrf

                                            {{-- <input type="hidden" name="id" id="{{ $permission->id }}"> --}}
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Permission Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name" value="{{ $permission->name }}"/>
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Group Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<select class="form-select mb-3" aria-label="Default select example" name="group_name">
                                                    <option selected="">Group Name</option>
                                                    <option value="brand" {{ $permission->group_name =='brand' ? 'selected': '' }}>Brand</option>
                                                    <option value="category" {{ $permission->group_name =='category' ? 'selected': '' }}>Category</option>
                                                    <option value="subcategory" {{ $permission->group_name =='subcategory' ? 'selected': '' }}>Sub-Category</option>
                                                    <option value="product" {{ $permission->group_name =='product' ? 'selected': '' }}>Product</option>
                                                    <option value="slider" {{ $permission->group_name =='slider' ? 'selected': '' }}>Slider</option>
                                                    <option value="banner" {{ $permission->group_name =='banner' ? 'selected': '' }}>Banner</option>
                                                    <option value="coupon" {{ $permission->group_name =='coupon' ? 'selected': '' }}>Coupon</option>
                                                    <option value="vendor" {{ $permission->group_name =='vendor' ? 'selected': '' }}>Vendor</option>
                                                    <option value="order" {{ $permission->group_name =='order' ? 'selected': '' }}>Order</option>
                                                    <option value="shipping" {{ $permission->group_name =='shipping' ? 'selected': '' }}>Shipping</option>
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

@endsection
