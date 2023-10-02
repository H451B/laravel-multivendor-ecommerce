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
    private function getProductView($action)
    {
        $roleViewPrefix = auth()->user()->isVendor() ? 'vendor.products.' : 'admin.products.';

        return $roleViewPrefix . $action;
    }

    public function index()
    {
        // if (auth()->user()->isVendor()) {
        //     // If the user is a vendor, fetch products associated with their vendor ID
        //     $vendorId = auth()->user()->id;

        //     // Fetch products for the specific vendor
        //     $products = Product::where('vendor_id', $vendorId)->get();
        //     return view('vendor.products.index', compact('products'));
        // }

        // $products = Product::latest()->get();
        // return view('admin.products.index',compact('products'));
        $products = auth()->user()->isVendor()
            ? Product::where('vendor_id', auth()->user()->id)->get()
            : Product::latest()->get();

        return view($this->getProductView('index'), compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        auth()->user()->isVendor()
            ? $activeVendor = User::where('id', auth()->user()->id)->latest()->get()
            : $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view($this->getProductView('create'),compact('brands','categories','activeVendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image =$request->file('product_image');
        $fileName = hexdec(uniqid()).'.'.
            $image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/product/'.$fileName);
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

        // return redirect()->route('products.index');
        return auth()->user()->isVendor() ? redirect()->route('vendor.products.index') : redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view($this->getProductView('show'), [
            'product'=>$product
        ]);
        // return view('admin.products.show',[
        //     'product'=>$product
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        auth()->user()->isVendor()
            ? $activeVendor = User::wherewhere('vendor_id', auth()->user()->id)->latest()->get()
            : $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        // return view('admin.products.edit',['product'=>$product],compact('brands','categories','activeVendor'));
        return view($this->getProductView('edit'),['product'=>$product], compact('brands', 'categories', 'activeVendor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $image =$request->file('product_image');
        $fileName = hexdec(uniqid()).'.'.
            $image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/product/'.$fileName);
        $save_url = 'upload/product/'.$fileName;
        $product->update([
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

        // return redirect()->route('products.index');
        return auth()->user()->isVendor() ? redirect()->route('vendor.products.index') : redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        // return redirect()->route('products.index');
        return auth()->user()->isVendor() ? redirect()->route('vendor.products.index') : redirect()->route('admin.products.index');
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        // return redirect()->route('products.index');
        return auth()->user()->isVendor() ? redirect()->route('vendor.products.index') : redirect()->route('admin.products.index');
    }

    public function showDetails($id)
    {
        // Fetch product details based on $id
        $product = Product::findOrFail($id);

        // Pass $product to the view and render the details page
        return view('frontend.details', compact('product'));
    }


}
