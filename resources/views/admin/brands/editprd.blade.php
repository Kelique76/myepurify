@extends('layouts.admin')
@section('content')

<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Form Ubah Produk</h4>
            <p class="card-description">
                Masukkan Data Perubahan
            </p>
            <a href="{{url('/admin/liatprd')}}"><button class="btn btn-danger" type="button">Batal</button></a>
            <br>
            <br>
            @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            @if (session('gagal'))
            <div class="alert alert-danger">{{session('gagal')}}</div>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $ror)
            <div class="alert alert-danger">{{$ror}}</div>
            @endforeach

            @endif
            <form class="forms-sample" action="{{url('admin/updateprd/'.$prds->id)}}" enctype="multipart/form-data"
                method="POST">
                @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" type="button" data-bs-target="#home-tab-pane"
                            data-bs-toggle="tab" href="#">Utama</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotag-tab" type="button" data-bs-target="#seotag-tab-pane"
                            data-bs-toggle="tab" href="#">SEO</button>

                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="detail-tab" type="button" data-bs-target="#detail-tab-pane"
                            data-bs-toggle="tab" href="#">Detail</button>

                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="gambar-tab" type="button" data-bs-target="#gambar-tab-pane"
                            data-bs-toggle="tab" href="#">Gambar</button>

                    </li>

                </ul>
                <div class="tab-content" id="myTabCT">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">

                        <div class="mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Kategori Produk</label>

                            <select name="category_id" class="form-control">
                                <option value="">Pilih Kategorinya</option>
                                @foreach ($cats as $ct)

                                <option style="color: black" value="{{$ct->id}}" {{$ct->id==
                                    $prds->category_id?'selected':''}}>{{$ct->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Nama Produk</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$prds->name}}" name="name" id="name"
                                    placeholder="Nama Produk">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Merk Produk</label>

                            <select name="brand" class="form-control">
                                <option value="">Pilih Merknya</option>
                                @foreach ($mrks as $mer)

                                <option value="{{$mer->name}}" {{$mer->name == $prds->brand?'selected':''}}
                                    >{{$mer->name}}</option>
                                @endforeach
                            </select>
                        </div>



                    </div>
                    <div class="tab-pane fade " id="seotag-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="1">

                        <br>
                        <div class="form-group row">
                            <label for="meta_title" class="col-sm-3 col-form-label"> Meta-title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$prds->meta_title}}" name="meta_title"
                                    id="meta_title" placeholder="Masukan meta-title">
                                @error('meta_title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="meta_key" class="col-sm-3 col-form-label">Meta-Keyword</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$prds->meta_key}}" name="meta_key"
                                    id="meta_key" placeholder="Masukkan meta-keyword">
                                @error('meta_key')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="meta_desc" class="col-sm-3 col-form-label">Meta-Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$prds->meta_desc}}" name="meta_desc"
                                    id="meta_desc" placeholder="Masukkan meta description">
                                @error('meta_description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade " id="detail-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="2">

                        <br>
                        <div class="form-group row">
                            <label for="ori_price" class="col-sm-3 col-form-label">Harga Normal</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{$prds->ori_price}}" id="ori_price"
                                    name="ori_price" placeholder="(Rp) Harga Normal Produk">
                                @error('ori_price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="selli_price" class="col-sm-3 col-form-label">Harga Jual Diskon</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{$prds->selli_price}}"
                                    id="selli_price" name="selli_price" placeholder="(Rp) Harga Jual Produk">
                                @error('selli_price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-sm-3 col-form-label">Jumlah Stok</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{$prds->quantity}}" id="quantity"
                                    name="quantity" placeholder="Jumlah Produk">
                                @error('quantity')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trending" class="col-sm-3 col-form-label">Trending Product?</label>
                            <div class="col-sm-9">
                                <input name="trending" type="checkbox" {{$prds->trending== '1'?'checked':''}}>
                                <h5>dicentang berarti trending</h5>
                                @error('trending')
                                <small class="text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status Product?</label>
                            <div class="col-sm-9">
                                <input name="status" type="checkbox" {{$prds->status== '1'?'checked':''}}>
                                <h5>dicentang berarti aktif</h5>
                                @error('status')
                                <small class="text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="small_desc" class="col-sm-3 col-form-label">Keterangan Singkat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$prds->small_desc}}" id="small_desc"
                                    name="small_desc" placeholder="Keterangan Singkat Produk">
                                @error('small_desc')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-sm-3 col-form-label">Keterangan Detail</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control" id="desc" name="desc"
                                    placeholder="Keterangan Lengkap Produk"> --}}
                                <textarea name="desc" value="{{$prds->desc}}" id="desc" cols="50" rows="20"></textarea>
                                @error('desc')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade " id="gambar-tab-pane" role="tabpanel" aria-labelledby="gambar-tab"
                        tabindex="3">
                        <br>
                        <div class="mb-3">
                            <label for="">Unggah Gambar Produk</label>

                            <input type="file" name="image[]" multiple class="form-control">

                        </div>
                        <div>
                            @if ($prds->produkGbr)
                            @foreach ($prds->produkGbr as $gbr)

                            <div class="col-md-3">
                                <div class="p-2 border mb-3">
                                    <img src="{{asset($gbr->image)}}" alt="Img" style="width: 80px; height: 80px;"
                                        class="me-4">
                                    <a href="{{url('admin/hapusgbr/'.$gbr->id)}}">del</a>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <h5>Img Kosong</h5>
                            @endif

                        </div>
                        <br>

                        <br>
                        <div class="mb-3">
                            <label for="">Ubah Variable Warna</label>
                            <br>
                            <div class="row">
                                <br>
                                @forelse ($wrns as $wrn)
                                <div class="col-md-3">
                                    Warna: <input type="checkbox" name="colors[{{$wrn->id}}]" value="{{$wrn->id}}">
                                    {{$wrn->name}}
                                    <br>
                                    Jumlah: <input type="number" name="clquantity[{{$wrn->id}}]"
                                        style="width: 70px; solid: 1px solid">
                                </div>
                                @empty
                                <div class="col-md-12">No Warna</div>
                                @endforelse ($wrns as $wrn)


                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis Warna</th>
                                        <th>Jumlah Stok</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prds->produkColor as $pwrn)
                                    <tr class="prd-color-tr">
                                        <td>@if ($pwrn->kolor)
                                            {{$pwrn->kolor->name}}
                                            @else
                                            Tiada Warna
                                            @endif

                                        </td>
                                        <td>
                                            <div class="input-group mb-3" style="width: 150px">
                                                <input type="text" value="{{$pwrn->quantity}}"
                                                    class="productKolorQty form-control form-control-sm">
                                                <button type="button" value="{{$pwrn->id}}"
                                                    class="updateProductKolorBtn btn btn-primary btn-sm text-white">Update</button>
                                            </div>
                                        </td>
                                        <td>
                                            <a type="button" href="{{url('admin/produks/'.$pwrn->id)}}"
                                            {{-- value="{{$pwrn->id}}"  --}}
                                            onclick="return confirm('Yakin mau hapus Warna ini?')"

                                                class="deleteProductKolorBtn btn btn-danger btn-sm text-white">Hapus</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary me-2">Simpan Produk</button>
                    <a href="{{url('/admin/liatprd')}}"><button class="btn btn-light" type="button">Batal</button></a>
                </div>
        </div>



        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.updateProductKolorBtn', function () {
            var prd_col_id = $(this).val();
            var qty = $(this).closest('.prd-color-tr').find('.productKolorQty').val();
            var prd_id = {{$prds->id}};
                     
            if(qty <= 0){
                alert('Harap isi jumlah produk');
            };
            var data = {
                'product_id': prd_id,
                'quantity': qty,
              
            };
            $.ajax({
                type: "POST",
                url: ""+prd_col_id,
                data: data,
                
                success: function (response) {
                    alert("Berhasil ubah jmlh warna");
                }
            });

           
        });
        // $(document).on('click','.deleteProductKolorBtn', function () {
        //     var prd_col_id = $(this).val();
        //     var thisClick = $(this);
        //     thisClick.closest('.prd-color-tr').remove();
        //     var data = {
        //         'wrn_id': prd_col_id,
                         
        //     };
        //     $.ajax({
        //         type: "GET",
        //         url: ""+prd_col_id,
        //         data: data,
                
        //         success: function (response) {
        //             alert(response.message);
        //         }
        //     });
        // });
    });
</script>

@endsection