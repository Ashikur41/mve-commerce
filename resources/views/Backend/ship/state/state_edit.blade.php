@extends('admin.admin_dashboard')

@section('main-content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center m b-3">
					<div class="breadcrumb-title pe-3">Add State</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add State</li>
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
                                        <form id="myForm" method="post" action="{{ route('update.state') }}">
                                            @csrf

                                        <input type="hidden" name="id" value="{{ $state->id }}">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Division Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<select class="form-select mb-3" aria-label="Default select example" name="division_id">
                                                    <option selected="" disabled>Division Name</option>
                                                    @foreach ($division as $divisions)
                                                        <option value="{{ $divisions->id }}"{{ $divisions->id == $state->division_id ? 'selected' : '' }}>{{ $divisions->division_name }}</option>
                                                    @endforeach
                                                </select>
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">District Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<select class="form-select mb-3" aria-label="Default select example" name="district_id">
                                                    <option selected="" disabled>District Name</option>
                                                    @foreach ($district as $districts)
                                                        <option value="{{ $districts->id }}" {{ $districts->id == $state->district_id ? 'selected' : '' }}>{{ $districts->district_name }}</option>
                                                    @endforeach

                                                </select>
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">State Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input type="text" class="form-control" name="state_name" value="{{ $state->state_name }}"/>
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
