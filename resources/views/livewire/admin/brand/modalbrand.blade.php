<div wire:ignore.self class="modal fade" id="merkModal" tabindex="-1" aria-labelledby="merkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="merkModalLabel">Tambahkan Merk Baru?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <form wire:submit.prevent="storeBrand">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label>Pilih Kategori</label>
              <select wire:model.defer="category_id" required class="form-control" id="">
                <option value="">-pilih kategori-</option>
                @foreach ($catz as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
               
              </select>
              @error('category_id')
              <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="mb-3">
                <label for="">Nama Merk</label>
                <input wire:model.defer="name" type="text" class="form-control">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Slug Merk</label>
                <input wire:model.defer="slug" type="text" class="form-control">
                @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="">Status Merk</label>
                <input wire:model.defer="status" type="checkbox" > <h5>dicentang berarti aktif</h5>
                @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
          </div>
  
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="updateMerkModal" tabindex="-1" aria-labelledby="updateMerkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateMerkModalLabel">Ubah Nama Merk?</h5>
          <button type="button" class="btn-close" wire:click="tutupModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading>
          <div class="spinner-border text-warning" role="status">
           
          </div> <span class="visually-hidden">Loading...</span>
        </div>

       <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand">
          <div class="modal-body">

            <div class="mb-3">
              <label>Pilih Kategori</label>
              <select wire:model.defer="category_id" required class="form-control" id="">
                <option value="">-pilih kategori-</option>
                @foreach ($catz as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
               
              </select>
              @error('category_id')
              <small class="text-danger">{{$message}}</small>
              @enderror
            </div>

            <div class="mb-3">
                <label for="">Nama Merk</label>
                <input  type="text" wire:model.defer="name" class="form-control">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Slug Merk</label>
                <input wire:model.defer="slug" type="text" class="form-control">
                @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="">Status Merk</label>
                <input wire:model.defer="status" type="checkbox"  > <h5>dicentang berarti aktif</h5>
                @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
          </div>
  
  
          <div class="modal-footer">
            <button type="button" wire:click="bukaModal" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Ubah</button>
          </div>
        </form>
       </div>
      </div>
    </div>
  </div>



  <div wire:ignore.self class="modal fade" id="hapusMerkModal" tabindex="-1" aria-labelledby="hapusMerkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapusMerkModalLabel">Mau Hapus Merk?</h5>
          <button type="button" class="btn-close" wire:click="tutupModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading>
          <div class="spinner-border text-warning" role="status">
           
          </div> <span class="visually-hidden">Loading...</span>
        </div>

       <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand">
          
  
          <div class="modal-footer">
            <button type="button" wire:click="bukaModal" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
       </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="deleteCategory" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    
                    <form action="{{ route('hapus.mrk', $mrk->id) }}" method="post">
                      <div class="modal-body">
                          @csrf
                          @method('DELETE')
                          <h5 class="text-center">Yakin mau hapus Merk ?</h5>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger">Yes, Hapus</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>