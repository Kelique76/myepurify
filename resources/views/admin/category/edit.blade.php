@extends('layouts.admin')
@section('content')

<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Form Edit Kategory</h4>
        <p class="card-description">
          Masukkan Data Editan Kategori
        </p>
        <form class="forms-sample" action="{{url('admin/ubahkat/'.$cats->id)}}" enctype="multipart/form-data" method="POST">
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
          <div class="form-group row">
            <label for="slug" class="col-sm-3 col-form-label">Slug</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->slug}}" name="slug" id="slug" placeholder="Nama slug">
              @error('slug')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->description}}" id="description" name="description" placeholder="Keterangan kategori">
              @error('description')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label"><h3>Bagian SEO</h3></label>
          
          </div>
          <div class="form-group row">
            <label for="meta_title" class="col-sm-3 col-form-label"> Meta-title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->meta_title}}" name="meta_title" id="meta_title" placeholder="Masukan meta-title">
              @error('meta_title')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="meta_keyword" class="col-sm-3 col-form-label">Meta-Keyword</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->meta_keyword}}" name="meta_keyword" id="meta_keyword" placeholder="Masukkan meta-keyword">
              @error('meta_keyword')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="meta_description" class="col-sm-3 col-form-label">Meta-Description</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$cats->meta_description}}" name="meta_description" id="meta_description" placeholder="Masukkan meta_description">
              @error('meta_description')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">Gambar Kategori</label>
            <div class="col-sm-9">
              <input type="file" class="form-control" name="image" id="image" >
              <img src="{{asset('http://fundaecomm.test/upload/category/'.$cats->image)}}" alt="" width="70px" height="50px" >
              @error('image')
                <small class="text-danger">{{$message}}</small>
              @enderror

            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">Status Kategori</label>
            <div class="col-sm-9">
              <input type="checkbox"  name="status" id="status" {{$cats->status=="1"?'checked':''}}>
            </div>
          </div>
         
          <button type="submit" class="btn btn-primary me-2">Ubah Kategori</button>
          <a href="{{url('/admin/category')}}"><button class="btn btn-light" type="button" >Cancel</button></a>
          
        </form>
      </div>
    </div>
  </div>



@endsection