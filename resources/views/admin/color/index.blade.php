@extends('layouts.admin')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif

      <div class="card-header">
        <div class="row">
          {{-- <a href=""> --}}
        <button type="button" class="btn btn-info btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#colorModal">
        
        <i class="mdi mdi-calendar-plus"></i>
          
        </button>
      </a>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Table Data Warna</h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Warna</th>
                <th>Kode</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($wrns as $wrn)
              <tr>
                <td>{{$wrn->id}}</td>
                <td>{{$wrn->name}}</td>
                <td>{{$wrn->code}}</td>
                
                <td><label class="badge badge-danger" style="color: red">
                  @if ($wrn->status== 0)
                      Aktif
                      @else
                      Pasif
                  @endif  
                </label></td>
                <td>
                  <a href="{{url('/admin/warna/'.$wrn->id.'/edit')}}"  class="btn btn-warning btn-rounded btn-fw">Ubah</a>
                  <a href="{{url('admin/hapuswrn/'.$wrn->id)}}" onclick="return confirm('Yakin mau hapus Catz ini?')" class="btn btn-danger btn-rounded btn-fw" >Hapus</a>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Warna</th>
                <th>Kode</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            
          </table>
          {{-- <div> {{$wrns->links()}}</div> --}}
         
        </div>
       
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="colorModalLabel">Tambah Warna</h5>
          <button type="button" class="btn-close" wire:click="tutupModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading>
          <div class="spinner-border text-warning" role="status">
           
          </div> <span class="visually-hidden">Loading...</span>
        </div>

       <div wire:loading.remove>
        <form action="{{url('/admin/tambahwarna')}}" method="POST">
            @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label for="">Nama Warna</label>
                <input  type="text" name="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
           
            
          </div>
  
  
          <div class="modal-footer">
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </form>
       </div>
      </div>
    </div>
  </div>

  @endsection