@foreach ($data as $item)

<div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/dashboard/jabatan/{{$item->id }}" method="post">
                @csrf
                @method("put")
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="text-capitalize">jabatan</label>
                        <input type="text" name="jabatan" value="{{ $dta->jabatan }}" class="form-control @error('jabatan')
                    form-control-danger
                    @enderror" required>
                        @error('jabatan')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">Gaji Pokok</label>
                        <input type="text" onkeyup="formatUang(this)" name="gaji_pokok" maxlength="11" value="{{$item->gaji_pokok }}" class="form-control @error("gaji_pokok")
                        form-control-danger
                        @enderror" required>
                        @error('gaji_pokok')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach
