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
use Intervention\Image\Facades\Image as Image;

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
        $image=$request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/products/thumbnail/'),$name_gen);
        // Image::make($image)->resize(800,800)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;

        $product_id=Product::insertGetId([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace('','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags'=>$request->product_tags,
            'product_size'=>$request->product_size,
            'product_color'=>$request->product_color,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'vendor_id'=>$request->vendor_id,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'product_thumbnail'=>$save_url,
            'status'=>1,
            'created_at'=>Carbon::now(),
        ]);

        //multi-image upload

        $images=$request->file('multi_img');
        foreach($images as $img){
            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('upload/products/multi-image/'),$make_name);
            // Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
            $uploadPath='upload/products/multi-image/'.$make_name;

            MulitImg::insert([
                'product_id'=>$product_id,
                'photo_name'=>$uploadPath,
                'created_at'=>Carbon::now(),
            ]);
        }

        $notification= array(
            'message'=>'Product Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.product')->with($notification);

    }
    public function EditProduct($id)
    {
        $brand=Brand::latest()->get();
        $category=Category::latest()->get();
        $subcategory=SubCategory::latest()->get();
        $activeVendor=User::where('status','active')->where('role','vendor')->latest()->get();
        $products=Product::findOrFail($id);
        return view('Backend.product.product_edit',compact('brand','category','activeVendor','subcategory','products'));
    }
    public function UpdateProduct(Request $request)
    {
        $product_id=$request->id;
        Product::findOrFail($product_id)->update([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace('','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags'=>$request->product_tags,
            'product_size'=>$request->product_size,
            'product_color'=>$request->product_color,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'vendor_id'=>$request->vendor_id,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),
        ]);

        $notification= array(
            'message'=>'Product Updated WithOut Image Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('all.product')->with($notification);
    }
    public function DeleteProduct($id)
    {

    }
}
