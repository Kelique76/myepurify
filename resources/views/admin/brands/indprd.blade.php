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
                <th>Nama Prd</th>
                <th>Masuk Catz</th>
                <th>Brand</th>
                <th>Harga</th>
              
                <th>Stoks</th>
                <th>Trend?</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prds as $ki=>$prd)
              <tr>
                <td>{{$ki+1}}</td>
                <td>{{$prd->name}}</td>
                <td>
                  @if ($prd->categornya)
                  {{$prd->categornya->name}}
                  @else
                    Liar
                  @endif
                </td>
              
                <td>{{$prd->brand}}</td>
                <td>{{$prd->ori_price}}</td>
             
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
                      Ya
                      @else
                      Tdk
                  @endif  
                </label></td>
                <td>
                  <a href="{{url('/admin/produk/'.$prd->id.'/edit')}}"  ><i class="mdi mdi-border-color"></i></a>
                  <a href="{{url('/admin/produkdel/'.$prd->id.'/hapus')}}" onclick="return confirm('Yakin mau hapus produk ini?')" ><i class="mdi mdi-delete menu-icon"></i></a>
                  
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Prd</th>
                <th>Masuk Catz</th>
                <th>Brand</th>
                <th>Harga</th>
              
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
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Hapus Produk?</h5>
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