<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MulitImg;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductDetails($id,$slug)
    {
        $product=Product::with('productSize')->findOrFail($id);

        $color=$product->product_color;
        $product_color=explode(',',$color);

        $size=$product->product_size;
        $product_size=explode(',',$size);

        $cat_id=$product->category_id;
        $relatedProduct= Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        $multiImage=MulitImg::where('product_id',$id)->get();
        $productSize=ProductSize::where('product_id',$id)->get();
        // dd($product);
        return view('frontend.product.product_details',compact('product','product_color',
        'multiImage','relatedProduct'));
    }

    public function ProductSize(Request $request)
    {
        $productSize=ProductSize::findOrFail($request->level);
        // dd($productSize);
        return response()->json([
            $productSize,
        ]);
    }


    public function VendorDetails($id)
    {
        $vendor=User::findOrFail($id);
        $v_product=Product::where('vendor_id',$id)->get();

        return view('frontend.vendor.vendor_details',compact('vendor','v_product'));
    }

    public function CateWiseProduct(Request $request,$id,$slug)
    {
        $products=Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name','ASC')->get();
        $breadCat= Category::where('id',$id)->first();
        $newProducts = Product::orderBy('id','DESC')->limit(3)->get();

        return view('frontend.product.category_view',compact('products','categories','breadCat','newProducts'));
    }

    public function SubCateWiseProduct(Request $request,$id,$slug)
    {
        $products=Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name','ASC')->get();
        $breadSubCat= SubCategory::where('id',$id)->first();
        $newProducts = Product::orderBy('id','DESC')->limit(3)->get();

        return view('frontend.product.subcategory_view',compact('products','categories','breadSubCat','newProducts'));
    }

    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color=$product->product_color;
        $product_color=explode(',',$color);

        $size=$product->product_size;
        $product_size=explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));

    }

    public function ProductSearch(Request $request){

        $request->validate(['search' => "required"]);

        $item = $request->search;
        $categories = Category::orderBy('category_name','ASC')->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        // dd($products);
        return view('frontend.product.search',compact('products','item','categories','newProduct'));

    }// End Method

    public function SearchProduct(Request $request){

        $request->validate(['search' => "required"]);

         $item = $request->search;
         $products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_slug','product_thumbnail','selling_price','id')->limit(6)->get();
         return view('frontend.product.search_product',compact('products'));

      }// End Method
}