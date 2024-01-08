@extends('admin.admin_dashboard')

@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Product Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.product') }}" class="btn btn-primary">Add Product</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $key=>$item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ (!empty($item->product_thumbnail)) ? url('upload/product/'.$item->product_thumbnail):url('upload/no_image.jpg') }}" alt="product Image" srcset="" style="width: 70px; height:40px;"></td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>{{ $item->discount_price }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('edit.product',$item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.product',$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
