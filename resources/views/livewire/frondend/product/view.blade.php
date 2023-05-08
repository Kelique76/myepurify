<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($prdks->produkGbr)
                        <img src="{{asset($prdks->produkGbr[0]->image)}}" class="w-100" alt="Img">
                        @else
                            <h4>Tiada Gambar</h4>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3"> 
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$prdks->name}}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home /  {{$prdks->categornya->name}} /  {{$prdks->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{$prdks->selli_price}}</span>
                            <span class="original-price">{{$prdks->ori_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        @if ($prdks->produkColor)
                            @foreach ($prdks->produkColor as $klritem)
                                <input type="radio" name="colorSelection" value="{{$klritem->id}}"> {{$klritem->kolor->name}}
                            @endforeach
                        @else
                            
                        @endif
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{!! $prdks->small_desc !!}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{!! $prdks->desc !!}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>