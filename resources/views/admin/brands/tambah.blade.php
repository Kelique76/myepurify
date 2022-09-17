@extends('layouts.admin')
@section('content')

<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Form Tambah Merk</h4>
        <p class="card-description">
          Masukkan Data Baru Merk
        </p>
        <form class="forms-sample" action="{{url('admin/tambahmerk')}}" enctype="multipart/form-data" method="POST">
          @csrf

          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama Merk</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nama Merk">
              @error('name')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
         
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
                <input name="status" type="checkbox" > <h5>dicentang berarti aktif</h5>
                @error('status')
                <small class="text-danger">{{$message}}</small>
             
              @enderror
            </div>
          </div>
          
         
          <button type="submit" class="btn btn-primary me-2">Simpan Brand</button>
          <a href="{{url('/admin/merks')}}"><button class="btn btn-light" type="button" >Batal</button></a>
          
        </form>
      </div>
    </div>
  </div>



@endsection