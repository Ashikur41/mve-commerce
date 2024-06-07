@extends('admin.admin_dashboard')

@section('main-content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Product</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Product</h5>
					  <hr/>

                      <form id="myForm" method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                        @csrf
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
							<div class="form-group mb-3">
								<label for="product_name" class="form-label">Product Name</label>
								<input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product Name">
							  </div>
							<div class="mb-3">
								<label for="product_tags" class="form-label">Product Tags</label>
								<input type="text" class="form-control visually-hidden" name="product_tags" data-role="tagsinput" value="new product,top product">
							</div>
                            <br>
                            <div class='item'>
                                <input type="text" name="product_size[]" placeholder="Enter Size">
                                <input type="text" name="selling_price[]" placeholder="Selling Price">
                                <input type="text" name="discount_price[]" placeholder="Discount Price">
                                <button id="add">Add +</button>
                             </div>
                             <div id="items"></div>
                             <br>
							{{-- <div class="mb-3">
								<label for="product_size" class="form-label">Product Size</label>
								<input type="text" class="form-control visually-hidden" name="product_size" data-role="tagsinput" value="Smaill,Midium,Large">
							</div> --}}
							<div class="mb-3">
								<label for="product_color" class="form-label">Product Color</label>
								<input type="text" class="form-control visually-hidden" name="product_color" data-role="tagsinput" value="red,Blue,Black">
							  </div>
							  <div class="form-group mb-3">
								<label for="short_description" class="form-label">Short Description</label>
								<textarea class="form-control" name="short_description" id="short_description" rows="3"></textarea>
							  </div>
							  <div class="mb-3">
								<label for="long_description" class="form-label">Long Description</label>
								<textarea class="form-control" name="long_description" id="long_description" rows="3"></textarea>
							  </div>
                              <div class="form-group mb-3">
								<label for="product_video" class="form-label">Product Video</label>
								<input class="form-control" name="product_video" type="file" id="formFile">
							  </div>
                              <div class="form-group mb-3">
								<label for="product_thumbnail" class="form-label">Main Thumbnail</label>
								<input class="form-control" name="product_thumbnail" type="file" onchange="mainThumUrl(this)" id="formFile">

								<img src="" id="mainThmb">
							  </div>
                              <div class="form-group mb-3">
								<label for="multi_img" class="form-label">Multiple Image</label>
								<input class="form-control" name="multi_img[]" type="file" id="multi_img" multiple="">
							  </div>
                            </div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="form-group col-md-6">
									<label for="selling_price" class="form-label">Product Price</label>
									<input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="00.00">
								  </div>
								  <div class="form-group col-md-6">
									<label for="discount_price" class="form-label">Discount Price</label>
									<input type="text" class="form-control" name="discount_price" id="discount_price" placeholder="00.00">
								  </div>
								  <div class="form-group col-md-6">
									<label for="product_code" class="form-label">Product Code</label>
									<input type="text" class="form-control" name="product_code" id="product_code" placeholder="00.00">
								  </div>
								  <div class="form-group col-md-6">
									<label for="product_qty" class="form-label">Product Qty</label>
									<input type="text" class="form-control" name="product_qty" id="product_qty" placeholder="00.00">
								  </div>
								  <div class="form-group col-12">
									<label for="brand_id" class="form-label">Product Brand</label>
									<select class="form-select" id="brand_id" name="brand_id">
										<option selected disabled>Brand</option>
                                        @foreach ($brand as $brands)
										<option value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="form-group col-12">
									<label for="category_id" class="form-label">Product Category</label>
									<select class="form-select" id="category_id" name="category_id">
										<option selected disabled>Category</option>
                                        @foreach ($category as $categorys)
										<option value="{{ $categorys->id }}">{{ $categorys->category_name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="form-group col-12">
									<label for="subcategory_id" class="form-label">Product SubCategory</label>
									<select class="form-select" name="subcategory_id" id="subcategory_id">
										<option selected disabled>SubCategory</option>

									  </select>
								  </div>
								  <div class="form-group col-12">
									<label for="vendor_id" class="form-label">Select Vendor</label>
									<select class="form-select" name="vendor_id" id="vendor_id">
										<option selected disabled>Select Vendor</option>
                                        @foreach ($activeVendor as $activeVendors)
										<option value="{{ $activeVendors->id }}">{{ $activeVendors->name }}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="col-12">
									<div class="row g-3">
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="hot_deals" value="1" id="hot_deals">
												<label class="form-check-label" for="hot_deals">Hot Deals</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="featured" value="1" id="hot_deals">
												<label class="form-check-label" for="featured">Featured</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="special_offer" value="1" id="special_offer">
												<label class="form-check-label" for="special_offer">Special Offer</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="special_deals" value="1" id="special_deals">
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





        <script>
            $(document).ready(()=>{
            let template = `<div class='item'>
                <input type="text" name="product_size[]" placeholder="Enter Size" />
                <input type="text" name="selling_price[]" placeholder="Selling Price" />
                <input type="text" name="discount_price[]" placeholder="Discount Price" />
                <button class="remove">X</button>
                </div>`;

            $("#add").on("click", ()=>{
                $("#items").append(template);
            })
            $("body").on("click", ".remove", (e)=>{
                $(e.target).parent("div").remove();
            })
        });
        </script>

                {{-- form valiedtion  --}}
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#myForm').validate({
                            rules:{
                                product_name:{
                                    required:true,
                                },
                                short_description:{
                                    required:true,
                                },
                                // product_thumbnail:{
                                //     required:true,
                                // },
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
                                category_id:{
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
                                // product_thumbnail:{
                                //     required:'Please Enter Product Thumbnail',
                                // },
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

                </script>
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
