<div>
    <div class="row">
        <div class="col-md-3">
            @if ($cats->produknya)
            <div class="card">
                <div class="card-header">
                    <h4>Merks</h4>
                </div>
                <div class="card-body">

                    @foreach ($cats->produknya as $item)
                    <div class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$item->name}}"> {{$item->name}}
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Harga</h4>
                </div>
                <div class="card-body">

                   
                    <div class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value=""> mhl-mrh
                        
                    </div><div class="d-block">
                        
                        <input type="checkbox" wire:model="brandInputs" value=""> mrh-mhl
                    </div>
                   
                </div>
            </div>

        </div>
        <div class="col-md-9">

            <div class="row">
                @forelse ($prdnya as $item)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($item->quantity >0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-success">Stock Habis</label>
                            @endif
                            @if ($item->produkGbr->count() > 0)

                            <img src="{{asset($item->produkGbr[0]->image)}}" alt="{{$item->name}}">

                            @endif

                        </div>
                        {{-- {{url('/koleksi/'.$item->categornya->slug.'/'.$item->slug)}} --}}
                        <div class="product-card-body">
                            <p class="product-brand">{{$item->brand}}</p>
                            <h5 class="product-name">
                                <a href="{{url('/koleksi/'.$item->id)}}">
                                    {{$item->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">Rp. {{number_format($item->selli_price)}}</span>
                                <span class="original-price">Rp. {{number_format($item->ori_price)}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <h5>Tidak ada product u/ kategori: {{$cats->name}}</h5>
                </div>
                @endforelse
            </div>


        </div>
    </div>
</div>