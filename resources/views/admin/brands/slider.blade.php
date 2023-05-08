@extends('layouts.admin')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
      @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif

      <div class="card-header">
        <div class="row">
          <a href="{{url('/admin/addsliders')}}">
        <button type="button" class="btn btn-info btn-rounded btn-icon">
        
        <i class="mdi mdi-calendar-plus"></i>
          
        </button>
      </a>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Table Slider Product</h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($slides as $id=> $sld)
              <tr>
                <td>{{$id+1}}</td>
                <td>{{$sld->title}}</td>
                <td class="text-danger"> <img src="{{'http://fundaecomm.test/upload/slider/'.$sld->image}}" alt=""> </td>
                <td>{{$sld->description}}</td>
                <td><label class="badge badge-danger" style="color: red">
                  @if ($sld->status== 0)
                      Ya
                      @else
                      Tdk
                  @endif  
                </label></td>
                <td>
                  <a href="{{url('/admin/slideedit/'.$sld->id)}}"  class="btn btn-warning btn-icon dt-center"><i class="mdi mdi-adjust dt-center"></i></a>
                  <a href="{{url('admin/hapusslide/'.$sld->id)}}" onclick="return confirm('Yakin mau hapus Catz ini?')" class="btn btn-danger btn-icon btn-fw dt-center" ><i class="mdi mdi mdi-delete"></i></a>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            
          </table>
          {{-- <div> {{$slides->links()}}</div> --}}
         
        </div>
       
      </div>
    </div>
  </div>

  @endsection

  