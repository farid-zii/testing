<div class="modal fade" id="add-jabatan" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/dashboard/pegawai" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="text-capitalize">nama</label>
                        <input type="text" name="nama" class="form-control @error('nama')
                    form-control-danger
                    @enderror" required>
                        @error('nama')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">foto</label>
                        <input type="file" name="foto" class="form-control @error('foto')
                    form-control-danger
                    @enderror" required>
                        @error('foto')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="text-capitalize">jabatan</label>
                        <select class="form-control" name="jabatan_id" required>
                            @foreach ($jabatan as $item )
                            <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">tanggal lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir')
                    form-control-danger
                    @enderror" required>
                        @error('tgl_lahir')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">alamat</label>
                        <textarea name="alamat" class="form-control @error('tgl_lahir')
                        form-control-danger
                        @enderror" required></textarea>
                        @error('alamat')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


