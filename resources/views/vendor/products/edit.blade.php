<x-admin.layouts.admin_master>

    <div class="card-header">
        Edit brand <a class="btn btn-info" href="{{route('vendor.products.index')}}">List</a>
    </div>

    <div class="card-body">
        <form action="{{route('vendor.products.update',['product'=>$product->id])}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ProductName</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="product_name"
                        value="{{$product->product_name}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ProductCode</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="product_code"
                        value="{{$product->product_code}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ProductQty</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="product_qty"
                        value="{{$product->product_qty}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ProductTags</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="product_tags"
                        value="{{$product->product_tags}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ProductSize</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="product_size"
                        value="{{$product->product_size}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ProductColor</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="product_color"
                        value="{{$product->product_color}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="selling_price"
                        value="{{$product->selling_price}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">DiscountPrice</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="discount_price"
                        value="{{$product->discount_price}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">ShortDescrp</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        class="form-control"
                        id="inputTitle"
                        name="short_descp"
                        value="{{$product->short_descp}}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="mytextarea" class="col-sm-3 col-form-label">LongDescrp</label>
                <div class="col-sm-9">
                <textarea class="form-control" name="long_descp"
                          placeholder="leave a comment here" id="mytextarea">
                {!! $product->long_descp !!}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputImg" class="col-sm-3 col-form-label">Picture</label>
                <div class="col-sm-9">
                    <input
                        type="file"
                        class="form-control"
                        id="inputImg"
                        name="product_image"
                        value="">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">Brand</label>
                <div class="col-sm-9">
                    <select name="brand_id" class="form-select">
                        <option></option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}"{{$brand->id == $product->brand_id ? 'selected':''}}>{{$brand->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-9">
                    <select name="category_id" class="form-select">
                        <option></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"{{$category->id == $product->category_id ? 'selected':''}}>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">Vendor</label>
                <div class="col-sm-9">
                    <select name="vendor_id" class="form-select">
                        <option></option>
                        @foreach($activeVendor as $vendor)
                            <option value="{{$vendor->id}}"{{$vendor->id == $product->vendor_id ? 'selected':''}}>{{$vendor->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input"
                               name="hot_deals" type="checkbox"
                               value="1" id="flexCheckDefault"{{$product->hot_deals == 1 ? 'checked':''}}>
                        <label class="form-check-label" for="flexCheckDefault">Hot Deals</label>

                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input"
                               name="special_deals" type="checkbox"
                               value="1" id="flexCheckDefault"{{$product->special_deals == 1 ? 'checked':''}}>
                        <label class="form-check-label" for="flexCheckDefault">SpecialDeals</label>

                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input"
                               name="featured" type="checkbox"
                               value="1" id="flexCheckDefault" {{$product->featured == 1 ? 'checked':''}}>
                        <label class="form-check-label" for="flexCheckDefault">Featured</label>

                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input"
                               name="special_offer" type="checkbox"
                               value="1" id="flexCheckDefault" {{$product->special_offer == 1 ? 'checked':''}}>
                        <label class="form-check-label" for="flexCheckDefault">SpecialOffer</label>

                    </div>
                </div>
            </div>

<div class="mb-3">
    <div class="col-sm-8">
        <button type="submit" class="btn btn-info">update</button>
    </div>
</div>

        </form>
    </div>

</x-admin.layouts.admin_master>

