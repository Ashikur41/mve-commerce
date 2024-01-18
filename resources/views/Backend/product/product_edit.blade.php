@extends('admin.admin_dashboard')



@section('main-content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Product</h5>
					  <hr/>

                      <form id="myForm" method="post" action="{{ route('update.product') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}">
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
							<div class="form-group mb-3">
								<label for="product_name" class="form-label">Product Name</label>
								<input type="text" name="product_name" class="form-control" id="product_name" value="{{ $products->product_name }}">
							  </div>
							<div class="mb-3">
								<label for="product_tags" class="form-label">Product Tags</label>
								<input type="text" class="form-control visually-hidden" name="product_tags" data-role="tagsinput" value="{{ $products->product_tags }}">
							  </div>
							<div class="mb-3">
								<label for="product_size" class="form-label">Product Size</label>
								<input type="text" class="form-control visually-hidden" name="product_size" data-role="tagsinput" value="{{ $products->product_size }}">
							  </div>
							<div class="mb-3">
								<label for="product_color" class="form-label">Product Color</label>
								<input type="text" class="form-control visually-hidden" name="product_color" data-role="tagsinput" value="{{ $products->product_color }}">
							  </div>
							  <div class="form-group mb-3">
								<label for="short_description" class="form-label">Short Description</label>
								<textarea class="form-control" name="short_description" id="short_description" rows="3">{{ $products->short_description }}</textarea>
							  </div>
							  <div class="mb-3">
								<label for="long_description" class="form-label">Long Description</label>
								<textarea class="form-control" name="long_description" id="long_description" rows="3">{{ $products->long_description }}</textarea>
							  </div>

                            </div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="form-group col-md-6">
									<label for="selling_price" class="form-label">Product Price</label>
									<input type="text" class="form-control" name="selling_price" id="selling_price" value="{{ $products->selling_price }}">
								  </div>
								  <div class="form-group col-md-6">
									<label for="discount_price" class="form-label">Discount Price</label>
									<input type="text" class="form-control" name="discount_price" id="discount_price" value="{{ $products->discount_price }}">
								  </div>
								  <div class="form-group col-md-6">
									<label for="product_code" class="form-label">Product Code</label>
									<input type="text" class="form-control" name="product_code" id="product_code" value="{{ $products->product_code }}">
								  </div>
								  <div class="form-group col-md-6">
									<label for="product_qty" class="form-label">Product Qty</label>
									<input type="text" class="form-control" name="product_qty" id="product_qty" value="{{ $products->product_qty }}">
								  </div>
								  <div class="form-group col-12">
									<label for="brand_id" class="form-label">Product Brand</label>
									<select class="form-select" id="brand_id" name="brand_id">
										<option></option>
                                        @foreach ($brand as $brands)
										<option value="{{ $brands->id }}" {{ $brands->id == $products->brand_id ? 'selected' : '' }}>{{ $brands->brand_name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="form-group col-12">
									<label for="category_id" class="form-label">Product Category</label>
									<select class="form-select" id="category_id" name="category_id">
										<option></option>
                                        @foreach ($category as $categorys)
										<option value="{{ $categorys->id }}" {{ $categorys->id == $products->category_id ? 'selected' : '' }}>{{ $categorys->category_name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="form-group col-12">
									<label for="subcategory_id" class="form-label">Product SubCategory</label>
									<select class="form-select" name="subcategory_id" id="subcategory_id">
										<option></option>
                                        @foreach ($subcategory as $Subcategory)
										<option value="{{ $Subcategory->id }}" {{ $Subcategory->id == $products->category_id ? 'selected' : '' }}>{{ $Subcategory->sub_category_name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="form-group col-12">
									<label for="vendor_id" class="form-label">Select Vendor</label>
									<select class="form-select" name="vendor_id" id="vendor_id">
										<option></option>
                                        @foreach ($activeVendor as $activeVendors)
										<option value="{{ $activeVendors->id }}" {{ $activeVendors->id == $products->vendor_id ? 'selected' : '' }}>{{ $activeVendors->name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="col-12">
									<div class="row g-3">
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="hot_deals" value="1" id="hot_deals" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
												<label class="form-check-label" for="hot_deals">Hot Deals</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="featured" value="1" id="hot_deals" {{ $products->featured == 1 ? 'checked' : '' }}>
												<label class="form-check-label" for="featured">Featured</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="special_offer" value="1" id="special_offer" {{ $products->special_offer == 1 ? 'checked' : '' }}>
												<label class="form-check-label" for="special_offer">Special Offer</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="special_deals" value="1" id="special_deals" {{ $products->special_deals == 1 ? 'checked' : '' }}>
												<label class="form-check-label" for="special_deals">Special Deals</label>
											</div>
										</div>
									</div>
								  </div>
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="submit" class="btn btn-primary">Save Product</button>
									  </div>
								  </div>
							  </div>
						  </div>
						  </div>
					   </div><!--end row-->
					</div>
                      </form>
				  </div>
			  </div>


			</div>
		</div>
		<!--end page wrapper -->

        {{-- main image thumbnail update --}}
        <div class="page-wrapper">
			<div class="page-content">
                <h6 class="mb-0 text-uppercase">update main image thumbnail</h6>
                <hr>
                <div class="card">
                    <form id="myForm" method="post" action="{{ route('update.product.thumbnail') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <input type="hidden" name="old_image" value="{{ $products->product_thumbnail }}">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chose Thumbnail Image</label>
                            <input class="form-control" type="file" id="formFile"name="product_thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"></label>
                            <img src="{{ asset($products->product_thumbnail) }}" alt="" srcset="" style="width: 100px;height: 100px;">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary px-4" value="Save Change">
                    </form>
                </div>
            </div>
        </div>


        {{-- Multi Image Update --}}
        <div class="page-wrapper">
			<div class="page-content">
                <h6 class="mb-0 text-uppercase">update multi image</h6>
                <hr>
        <div class="card">
            <div class="card-body">
                <table class="table mb-0 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Image</th>
                            <th scope="col">Change Image</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" action="{{ route('update.product.multiImage') }}" enctype="multipart/form-data">
                            @csrf
                        @foreach ($multiImg as $key=>$img)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td><img src="{{ asset($img->photo_name) }}" style="width: 70px;height:40px;"></td>
                            <td><input type="file" class="form-control" name="multi_img[{{ $img->id }}]"></td>
                            <td>
                                <input type="submit" class="btn btn-primary px-4" value="Update Image">
                                <a href="{{ route('multiImage.delete',$img->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
                {{-- form valiedtion  --}}
                {{-- <script type="text/javascript">
                    $(document).ready(function(){
                        $('#myForm').validate({
                            rules:{
                                product_name:{
                                    required:true,
                                },
                                short_description:{
                                    required:true,
                                },
                                product_thumbnail:{
                                    required:true,
                                },
                                multi_img:{
                                    required:true,
                                },
                                selling_price:{
                                    required:true,
                                },
                                discount_price:{
                                    required:true,
                                },
                                product_code:{
                                    required:true,
                                },
                                product_qty:{
                                    required:true,
                                },
                                brand_id:{
                                    required:true,
                                },
                                category_id:{
                                    required:true,
                                },
                                subcategory_id:{
                                    required:true,
                                },
                            },
                            messages:{
                                product_name:{
                                    required:'Please Enter Product Name',
                                },
                                short_description:{
                                    required:'Please Enter Short Description',
                                },
                                product_thumbnail:{
                                    required:'Please Enter Product Thumbnail',
                                },
                                multi_img:{
                                    required:'Please Enter Multi Img',
                                },
                                selling_price:{
                                    required:'Please Enter Product Price',
                                },
                                discount_price:{
                                    required:'Please Enter Discount Price',
                                },
                                product_code:{
                                    required:'Please Enter Product Code',
                                },
                                product_qty:{
                                    required:'Please Enter Product Qty',
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

                </script> --}}
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
            function mainThumUrl(input)
			{
				if(input.files && input.files[0])
				{
					ver reader=new FileReader();
					reader.onload=function(e){
						$('#mainThmb').attr('src',e.target.result).width(80).height(80);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}


            $(document).ready(function(){
                $('#myForm').validate({
                    rules:{
                        category_name:{
                            required:true,
                        },
                    },
                    messages:{
                        category_name:{
                            required:'Please Enter Category Name',
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

        {{-- Category and SubCategory related --}}
        <script>
            $(document).ready(function(){
                $('select[name="category_id"]').on('change',function(){
                    var category_id=$(this).val();
                    if(category_id){
                        $.ajax({
                            url:"{{ url('/subcategory/ajax') }}/"+category_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data){
                                $('select[name="subcategory_id"]').html('');
                                var d =$('select[name="subcategory_id"]').empty();
                                $.each(data,function(key, value){
                                    $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name + '</option>');
                                });
                            },
                        });
                    }else{
                        alert('danger');
                    }
                });
            });
        </script>

@endsection
