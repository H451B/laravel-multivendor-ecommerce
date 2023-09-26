<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.products.create',compact('brands','categories','activeVendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image =$request->file('product_image');
        $fileName = hexdec(uniqid()).'.'.
            $image->getClientOriginalExtension();
        Image::make($image)->resize(1920,622)->save('upload/product/'.$fileName);
        $save_url = 'upload/product/'.$fileName;
        Product::create([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'product_name'=>$request->product_name,
            'product_slug'=> strtolower(str_replace('','_', $request->product_name)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags'=>$request->product_tags,
            'product_size'=>$request->product_size,
            'product_color'=>$request->product_color,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp'=>$request->short_descp,
            'long_descp'=>$request->long_descp,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
             'vendor_id'=>$request->vendor_id,
            'status'=>1,
            'product_image'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
