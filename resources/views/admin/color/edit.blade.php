@extends('layouts.admin')
@section('content')

<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Form Edit Warna</h4>

        @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <p class="card-description">
          Masukkan Data Editan Warna
        </p>
       
        <form class="forms-sample" action="{{url('admin/ubahwrn/'.$wrnya->id)}}"  method="POST">
          @csrf
          @method("PUT")
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama Warna</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$wrnya->name}}" name="name" id="name" placeholder="Nama Kategori">
              @error('name')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="slug" class="col-sm-3 col-form-label">Kode Warna</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$wrnya->code}}" name="code" id="code" placeholder="Kode ">
              @error('code')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
                <input name="status" type="checkbox" {{$wrnya->status == "0"?"checked" : ""
            }}> <h6>dicentang berarti aktif</h6>
                @error('status')
                <small class="text-danger">{{$message}}</small>
             
              @enderror
            </div>
          </div>
          
         
          <button type="submit" class="btn btn-primary me-2">Ubah Warna</button>
          <a href="{{url('/admin/warnas')}}"><button class="btn btn-light" type="button" >Cancel</button></a>
          
        </form>
      </div>
    </div>
  </div>



@endsection