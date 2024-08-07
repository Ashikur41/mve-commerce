@extends('admin.admin_dashboard')

@section('main-content')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog Post Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Post Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.blog.post') }}" class="btn btn-primary">Add Blog Post</a>
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
                                <th>Post Category</th>
                                <th>Post Image</th>
                                <th>Post Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AllblogPost as $key=>$item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->bolgCategory['blog_category_name'] }}</td>
                                    <td><img src="{{ (!empty($item->post_image)) ? url('upload/blog_post/'.$item->post_image):url('upload/no_image.jpg') }}" alt="Category Image" srcset="" style="width: 70px; height:40px;"></td>
                                    <td>{{ $item->post_title }}</td>
                                    <td>
                                        <a href="{{ route('edit.blog.post',$item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.blog.post',$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Post Category</th>
                                <th>Post Image</th>
                                <th>Post Title</th>
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
