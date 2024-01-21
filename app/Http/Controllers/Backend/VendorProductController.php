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
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    public function AllVendorProduct()
    {
        $id=Auth::user()->id;
        $product=Product::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.product.vendor_all_product',compact('product'));
    }

    public function AddVendorProduct()
    {
        $brand=Brand::latest()->get();
        $category=Category::latest()->get();
        return view('vendor.backend.product.add_vendor_product',compact('brand','category'));
    }

        // Category and SubCategory related
        public function vendorGetSubcategory($category_id)
        {
            $subCat=SubCategory::where('category_id',$category_id)->orderBy('sub_category_name','ASC')->get();
            return json_encode($subCat);
        }

        public function StoreVendorProduct(Request $request)
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
            'vendor_id'=>Auth::user()->id,
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
            'message'=>'Vendor Product Inserted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('vendor.product.all')->with($notification);

    }

    public function EditVendorProduct($id)
    {
        $brand=Brand::latest()->get();
        $category=Category::latest()->get();
        $subcategory=SubCategory::latest()->get();
        $products=Product::findOrFail($id);
        $multiImg=MulitImg::where('product_id',$id)->get();
        return view('vendor.backend.product.vendor_edit_product',compact('brand','category','subcategory','products','multiImg'));
    }

    public function UpdateVendorProduct(Request $request)
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
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),
        ]);

        $notification= array(
            'message'=>'Vendor Product Updated WithOut Image Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->route('vendor.product.all')->with($notification);
    }

    public function vendorThumbnailProduct(Request $request)
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

    public function vendorMultiImageProduct(Request $request)
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
            'message'=>'Vendor Product Multi Image Updated Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function vendorMultiImageDeleteProduct($id)
    {
        $oldImage=MulitImg::findOrFail($id);
        unlink($oldImage->photo_name);

        MulitImg::findOrFail($id)->delete();

        $notification= array(
            'message'=>'Vendor Product Multi Image Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function vendorInActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);

        $notification= array(
            'message'=>'Product InActive Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function vendorActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);

        $notification= array(
            'message'=>'Product Active Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteVendorProduct($id)
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
            'message'=>'Vendor Product Deleted Successfully !',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
