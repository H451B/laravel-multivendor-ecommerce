<x-admin.layouts.admin_master>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="card-title mb-0">Products</h2>
                        </div>
                        <div class="col" style="text-align: center;">
                            Total <span style="color: red;">{{count($products)}}</span> Products
                        </div>
                        <div class="col" style="text-align: end;">
                            <a class=" btn btn-info" href="{{route('products.create')}}">Create Products</a>
                        </div>
                    </div>
                </div>

                <div class="divider" style="border:1px solid #E6E6E6"></div>

                <table class="table table-hover" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th class="d-none d-xl-table-cell">Name</th>
                            <th class="d-none d-xl-table-cell">Picture</th>
                            <th class="d-none d-xl-table-cell">price</th>
                            <th class="d-none d-xl-table-cell">Quentity</th>
                            <th class="d-none d-xl-table-cell">Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $products as $key =>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="d-none d-xl-table-cell">{{$product->product_name}}</td>
                            <td> <img src="{{asset("$product->product_image")}}" style="width: 70px;height: 40px"></td>
                            <td class="d-none d-xl-table-cell">{{$product->selling_price}}</td>
                            <td class="d-none d-xl-table-cell">{{$product->product_qty}}</td>

                            <td>
                                @if($product->discount_price == NULL)
                                <span class="badge rounded-pill bg-info">No Discount</span>
                                @else
                                @php
                                $amount = $product->selling_price-$product->discount_price;
                                $discount = ($amount/$product->selling_price)*100;
                                @endphp
                                <span class="badge rounded-pill bg-danger">{{round($discount)}}%</span>
                                @endif
                            </td>

                            <td>
                                @if($product->status == 1)
                                <span class="badge rounded-pill bg-success">Active</span>
                                @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                                @endif
                            </td>


                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('products.show',['product' =>$product->id])}}">show</a>
                                <a class="btn btn-warning btn-sm" href="{{route('products.edit',['product' =>$product->id])}}">Edit</a>
                                <form style="display: inline" action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure want to delete?')">Delete</button>

                                    @if($product->status ==1)
                                    <a href="{{route('product.inactive',$product->id)}}" class="btn btn-primary" title="Inactive"><i class="fa-solid fa fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{route('product.active',$product->id)}}" class="btn btn-primary" title="Active"><i class="fa-solid fa fa-thumbs-down"></i></a>
                                    @endif
                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>



</x-admin.layouts.admin_master>