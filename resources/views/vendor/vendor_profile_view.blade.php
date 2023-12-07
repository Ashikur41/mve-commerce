@extends('vendor.vendor_dashboard')



@section('main-content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{ (!empty($vendorData->photo)) ? url('upload/vendor_image/'.$vendorData->photo):url('upload/no_image.jpg') }}" alt="vendor" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>{{ $vendorData->name }}</h4>
												<p class="text-secondary mb-1">{{ $vendorData->username }}</p>
												<p class="text-muted font-size-sm">{{ $vendorData->address }}</p>
											</div>
										</div>
										<hr class="my-4" />
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                        <form method="post" action="{{ route('vendor.profile.store') }}" enctype="multipart/form-data">
                                            @csrf
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="username" value="{{ $vendorData->username }}" disabled/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Shop Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name" value="{{ $vendorData->name }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="email" value="{{ $vendorData->email }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="phone" value="{{ $vendorData->phone }}" />
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Join Date</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<select name="vendor_join" class="form-select mb-3" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="2024" {{ $vendorData->vendor_join == 2024 ? 'selected' : ''}}>2024</option>
                                                    <option value="2025" {{ $vendorData->vendor_join == 2025 ? 'selected' : ''}}>2025</option>
                                                    <option value="2026" {{ $vendorData->vendor_join == 2026 ? 'selected' : ''}}>2026</option>
                                                    <option value="2027" {{ $vendorData->vendor_join == 2027 ? 'selected' : ''}}>2027</option>
                                                    <option value="2028" {{ $vendorData->vendor_join == 2028 ? 'selected' : ''}}>2028</option>
                                                    <option value="2029" {{ $vendorData->vendor_join == 2029 ? 'selected' : ''}}>2029</option>
                                                    <option value="2030" {{ $vendorData->vendor_join == 2030 ? 'selected' : ''}}>2030</option>
                                                </select>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Info</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea type="text" class="form-control" name="vendor_short_info" value="Bay Area, San Francisco, CA" >{{ $vendorData->vendor_short_info }}</textarea>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea type="text" class="form-control" name="address" value="Bay Area, San Francisco, CA" >{{ $vendorData->address }}</textarea>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Photo</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control" name="photo" id="image"/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<img id="showImage" src="{{ (!empty($vendorData->photo)) ? url('upload/vendor_image/'.$vendorData->photo):url('upload/no_image.jpg') }}" alt="Vendor" style="width: 100px; hight:100px;">
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
@endsection
