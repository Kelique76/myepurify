<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif

      <div class="card-header">
        <div class="row">
          <a href="{{url('/admin/liatcategory')}}">
        <button type="button" class="btn btn-info btn-rounded btn-icon">
        
        <i class="mdi mdi-calendar-plus"></i>
          
        </button>
      </a>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Table Kategori Product</h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>CATZ</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($katas as $id=> $kata)
              <tr>
                <td>{{$id+1}}</td>
                <td>{{$kata->name}}</td>
                <td class="text-danger"> <img src="{{'http://fundaecomm.test/upload/category/'.$kata->image}}" alt=""> </td>
                <td><label class="badge badge-danger" style="color: red">
                  @if ($kata->status== "0")
                      Ya
                      @else
                      Tdk
                  @endif  
                </label></td>
                <td>
                  <a href="{{url('/admin/categori/'.$kata->id.'/edit')}}"  class="btn btn-warning btn-icon dt-center"><i class="mdi mdi-adjust"></i></a>
                  <a href="{{url('admin/hapuscats/'.$kata->id)}}" onclick="return confirm('Yakin mau hapus Catz ini?')" class="btn btn-danger btn-icon btn-fw" ><i class="mdi mdi mdi-delete"></i></a>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>CATZ</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            
          </table>
          <div> {{$katas->links()}}</div>
         
        </div>
       
      </div>
    </div>
  </div>

  