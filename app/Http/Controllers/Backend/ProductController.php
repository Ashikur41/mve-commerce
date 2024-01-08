<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MulitImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

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
