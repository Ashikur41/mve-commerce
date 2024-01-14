<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MulitImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $product=Product::latest()->get();
        return view('Backend.product.all_product',compact('product'));
    }

    public function AddProduct()
    {
        $brand=Brand::latest()->get();
        $category=Category::latest()->get();
        $activeVendor=User::where('status','active')->where('role','vendor')->latest()->get();
        return view('Backend.product.product_add',compact('brand','category','activeVendor'));
    }

    public function StoreProduct(Request $request)
    {
        $data=new Product();
        $data->brand_id=$request->brand_id;
        $data->category_id=$request->category_id;
        $data->subcategory_id=$request->subcategory_id;
        $data->product_name=$request->product_name;
        $data->product_slug=strtolower(str_replace('','-',$request->product_name));

        $data->product_code=$request->product_code;
        $data->product_qty=$request->product_qty;
        $data->product_tags=$request->product_tags;
        $data->product_size=$request->product_size;
        $data->product_color=$request->product_color;

        $data->selling_price=$request->selling_price;
        $data->discount_price=$request->discount_price;
        $data->short_description=$request->short_description;
        $data->long_description=$request->long_description;

        $data->hot_deals=$request->hot_deals;
        $data->featured=$request->featured;
        $data->special_offer=$request->special_offer;
        $data->special_deals=$request->special_deals;
        $data->vendor_id=$request->vendor_id;
        $data->status=1;
        // $data->created_at=Carbon::now();
        if($request->file('product_thumbnail'))
        {
            $file= $request->file('product_thumbnail');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/products/thumbnail/'),$fileName);
            $data['product_thumbnail']=$fileName;
        }
        // dd($data);
        $data->save();

        // $file= $request->file('product_thumbnail');
        // $fileName= date('YmdHi').$file->getClientOriginalName();
        // $file->move(public_path('upload/products/thumbnail/'),$fileName);
        // $data['product_thumbnail']=$fileName;

        // $product_id= Product::insert([
        //     'brand_id'=>$request->brand_id,
        //     'category_id'=>$request->category_id,
        //     'subcategory_id'=>$request->subcategory_id,
        //     'product_name'=>$request->product_name,
        //     'product_slug'=>strtolower(str_replace('','-',$request->product_name)),

        //     'product_code'=>$request->product_code,
        //     'product_qty'=>$request->product_qty,
        //     'product_tags'=>$request->product_tags,
        //     'product_size'=>$request->product_size,
        //     'product_color'=>$request->product_color,

        //     'selling_price'=>$request->selling_price,
        //     'discount_price'=>$request->discount_price,
        //     'short_description'=>$request->short_description,
        //     'long_description'=>$request->long_description,

        //     'hot_deals'=>$request->hot_deals,
        //     'featured'=>$request->featured,
        //     'special_offer'=>$request->special_offer,
        //     'special_deals'=>$request->special_deals,

        //     'product_thumbnail'=>$data,
        //     'vendor_id'=>$request->vendor_id,
        //     'status'=>1,
        //     'created_at'=>Carbon::now(),
        // ]);

        // //Multi Image

        // $images= $request->file('multi_img');
        // foreach($images as $img)
        // {
        //     $make_name= hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        //     Image::make($img)->resize(800,800)->save('upload/products/multi_img/'.$make_name);
        //     $UploadPath='upload/products/multi_img/'.$make_name;



        //     MulitImg::insert([
        //         'product_id'=>$product_id,
        //         'photo_name'=>$UploadPath,
        //         'created_at'=>Carbon::now(),
        //     ]);
        // }

        // dd($product_id);
        $notification= array(
            'message'=>'Product Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.product')->with($notification);
    }
    public function EditProduct($id)
    {

    }
    public function UpdateProduct(Request $request)
    {

    }
    public function DeleteProduct($id)
    {

    }
}
