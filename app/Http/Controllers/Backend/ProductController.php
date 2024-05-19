<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MulitImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\ProductSize;
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
        if (is_array($request) || is_object($request))
        {
            $product=Product::insertGetId([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'product_name'=>$request->product_name,
                'product_slug'=>strtolower(str_replace('','-',$request->product_name)),
                'product_code'=>$request->product_code,
                'product_qty'=>$request->product_qty,
                'product_tags'=>$request->product_tags,
                'product_color'=>$request->product_color,
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

            foreach($request->product_size as $key=>$size)
            {
                $product_id=ProductSize::insertGetId([
                    'product_id'=> $product,
                    'product_size'=>$size,
                    'selling_price'=>$request->selling_price[$key],
                    'discount_price'=>$request->discount_price[$key],
                    'created_at'=>Carbon::now(),
                ]);
            }
        }


        //multi-image upload

        $images=$request->file('multi_img');
        if (is_array($images) || is_object($images)){
            foreach($images as $img){
                $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $img->move(public_path('upload/products/multi-image/'),$make_name);
                // Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
                $uploadPath='upload/products/multi-image/'.$make_name;

                MulitImg::insert([
                    'product_id'=>$product,
                    'photo_name'=>$uploadPath,
                    'created_at'=>Carbon::now(),
                ]);
            }
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
        $multiImg=MulitImg::where('product_id',$id)->get();
        return view('Backend.product.product_edit',compact('brand','category','activeVendor','subcategory','products','multiImg'));
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
        $product=Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images=MulitImg::where('product_id',$id)->get();
        foreach($images as $img)
        {
            unlink($img->photo_name);
            MulitImg::where('product_id',$id)->delete();
        }

        $notification= array(
            'message'=>'Product Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function thumbnailProduct(Request $request)
    {
        $pro_id=$request->id;
        $old_image=$request->old_image;

        $image=$request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/products/thumbnail/'),$name_gen);
        // Image::make($image)->resize(800,800)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;

        if(file_exists($old_image)){
            unlink($old_image);
        }

        Product::findOrFail($pro_id)->update([
            'product_thumbnail'=>$save_url,
            'updated_at'=>Carbon::now()
        ]);

        $notification= array(
            'message'=>'Product Image Thumbnail Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function multiImageProduct(Request $request)
    {
        $imgs=$request->multi_img;

        foreach($imgs as $id =>$img)
        {
            $imgDelete=MulitImg::findOrFail($id);
            unlink($imgDelete->photo_name);

            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('upload/products/multi-image/'),$make_name);
            // Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
            $uploadPath='upload/products/multi-image/'.$make_name;

            MulitImg::where('id',$id)->update([
                'photo_name'=>$uploadPath,
                'updated_at'=>Carbon::now(),
            ]);
        }

        $notification= array(
            'message'=>'Product Multi Image Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function multiImageDeleteProduct($id)
    {
        $oldImage=MulitImg::findOrFail($id);
        unlink($oldImage->photo_name);

        MulitImg::findOrFail($id)->delete();

        $notification= array(
            'message'=>'Product Multi Image Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function InActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);

        $notification= array(
            'message'=>'Product InActive Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);

        $notification= array(
            'message'=>'Product Active Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductStock(){

        $products = Product::latest()->get();
        return view('Backend.product.product_stock',compact('products'));

    }// End Method
}