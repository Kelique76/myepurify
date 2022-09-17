<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif

      <div class="card-header">
       
         
            <div class="row">
              <a href="{{url('/admin/nambahbrand')}}">
            <button type="button" class="btn btn-info btn-rounded btn-icon">
        
        <i class="mdi mdi-calendar-plus"></i>
          
        </button>
      </a>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Table Data Merk </h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($brands as $mrk)
              <tr>
                <td>{{$mrk->id}}</td>
                <td>{{$mrk->name}}</td>
               
                <td><label class="badge badge-danger" style="color: red">
                  @if ($mrk->status== 0)
                      Aktif
                      @else
                      Pasif
                  @endif  
                </label></td>
                <td>
                  <a href="{{url('/admin/brand/'.$mrk->id.'/edit')}}" class="btn btn-warning btn-rounded btn-fw" >Ubah</a>
                  {{-- <a href="#" class="btn btn-danger btn-rounded btn-fw" data-bs-toggle="modal" data-bs-target="#hapusMerkModal">Hapus</a> --}}
                  <a href="{{url('/admin/hapusmerk/'.$mrk->id)}}" class="btn btn-danger btn-rounded btn-fw" >Hapus</a>
                 
                  
               
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama</th>
                
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            
          </table>
          <div> {{$brands->links()}}</div>
         
        </div>
       
      </div>
    </div>
  </div>

  @include('livewire.admin.brand.modalbrand')


  <script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>


@push('script')
  <script>
    window.addEventListener('close-modal', event=>{$('#merkModal').hide()});
  </script>
@endpush
