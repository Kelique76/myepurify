@extends('layouts.app')
@section('title','Product Kategori')
{{-- {{$cats->meta_keyword}} --}}
{{-- @endsection --}}
{{-- @section('meta_keyword','Product Kategori') --}}
{{-- {{$cats->meta_keyword}} --}}
{{--  --}}
{{-- @section('meta_description','Product Kategori') --}}
{{-- {{$cats->meta_description}} --}}
{{-- @endsection --}}
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Detail Products</h4>
            </div>
           
            <livewire:frondend.product.view : cats="$cats" : prdks="$prdks" />
            
        </div>
    </div>
</div>

@endsection
