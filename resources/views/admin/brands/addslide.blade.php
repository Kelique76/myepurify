@extends('layouts.admin')
@section('content')

<div class="col-md-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"> Form Tambah Slider</h4>
      <p class="card-description">
        Masukkan Data Baru Slider
      </p>
      <form class="forms-sample" action="{{url('admin/addupsliders')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label">Judul</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="title" id="title" placeholder="Judul Slider">
            @error('title')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
       
        <div class="form-group row">
          <label for="description" class="col-sm-3 col-form-label">Keterangan Slider</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="description" name="description"
              placeholder="Keterangan kategori">
            @error('description')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        
        <div class="form-group row">
          <label for="image" class="col-sm-3 col-form-label">Gambar Slide</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" name="image" id="image">
            @error('image')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="image" class="col-sm-3 col-form-label">Status Slide</label>
          <div class="col-sm-9">
            <input type="checkbox" name="status" id="status">
          </div>
        </div>

        <button type="submit" class="btn btn-primary me-2">Simpan Slider</button>
        <a href="{{url('/admin/sliders')}}"><button class="btn btn-light" type="button">Cancel</button></a>

      </form>
    </div>
  </div>
</div>



@endsection