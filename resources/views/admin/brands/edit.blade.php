@extends('layouts.admin')
@section('content')

<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Form Edit Brands</h4>
        <p class="card-description">
          Masukkan Data Editan Brand
        </p>
        <form class="forms-sample" action="{{url('admin/ubahmrk/'.$cats->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method("PUT")
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->name}}" name="name" id="name" placeholder="Nama Kategori">
              @error('name')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          {{-- <div class="form-group row">
            <label for="slug" class="col-sm-3 col-form-label">Slug</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->slug}}" name="slug" id="slug" placeholder="Nama slug">
              @error('slug')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div> --}}
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
                <input name="status" type="checkbox" {{$cats->status == "0"?"checked" : ""
            }}> <h6>dicentang berarti aktif</h6>
                @error('status')
                <small class="text-danger">{{$message}}</small>
             
              @enderror
            </div>
          </div>
          
         
          <button type="submit" class="btn btn-primary me-2">Ubah Kategori</button>
          <a href="{{url('/admin/merks')}}"><button class="btn btn-light" type="button" >Cancel</button></a>
          
        </form>
      </div>
    </div>
  </div>



@endsection