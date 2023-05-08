@extends('layouts.app')
@section('title','Semua Kategori')

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Semua Kategori</h4>
            </div>
            @forelse ( $clds as $item )
            <div class="col-6 col-md-3">
               
                <div class="category-card">
                    <a href="{{url('/koleksi/'.$item->slug)}}">
                        <div class="category-card-img">
                            <img src="{{asset('http://fundaecomm.test/upload/category/'.$item->image)}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$item->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
               
                    <div class="col-md-12">
                        <h5>Tidak ada</h5>
                    </div>
                @endforelse ($clds as $item)
                    
                
                
            </div>
            
        </div>
    </div>
</div>
@endsection