@extends('layouts.admin')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif

      <div class="card-header">
        <div class="row">
          <a href="{{url('/admin/nambahprd')}}">
        <button type="button" class="btn btn-info btn-rounded btn-icon">
        
        <i class="mdi mdi-calendar-plus"></i>
          
        </button>
      </a>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Table Data Purify Product</h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Brand</th>
                <th>Harga</th>
                <th>Promo</th>
                <th>Stoks</th>
                <th>Trend?</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prds as $prd)
              <tr>
                <td>{{$prd->id}}</td>
                <td>{{$prd->name}}</td>
                <td>{{$prd->slug}}</td>
                <td>{{$prd->brand}}</td>
                <td>{{$prd->ori_price}}</td>
                <td>{{$prd->selli_price}}</td>
                <td>{{$prd->quantity}}</td>
                <td><label class="badge badge-danger" style="color: red">
                    @if ($prd->trending== 1)
                        Y
                        @else
                        N
                    @endif  
                  </label></td>
               
                <td><label class="badge badge-danger" style="color: red">
                  @if ($prd->status== 0)
                      Aktif
                      @else
                      Pasif
                  @endif  
                </label></td>
                <td>
                  <a href="{{url('/admin/categori/'.$prd->id.'/edit')}}"  class="btn btn-warning btn-rounded btn-fw">Ubah</a>
                  {{-- <a href="#" wire:click='deleteCats({{$prd->id}})' class="btn btn-danger btn-rounded btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</a> --}}
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Brand</th>
                <th>Harga</th>
                <th>Promo</th>
                <th>Stoks</th>
                <th>Trend?</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            
          </table>
          {{-- <div> {{$prds->links()}}</div> --}}
         
        </div>
       
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Hapus Ketegori?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <form wire:submit.prevent="destroyCategory()">
          <div class="modal-body">
            <h3>Hapus Kategori</h3>
          </div>
  
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection