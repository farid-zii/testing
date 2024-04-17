@foreach ($data as $item)

<div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/dashboard/kontrak/{{$item->id }}" method="post">
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
                        <label for="" class="text-capitalize">Pegawai</label>
                        <select class="form-control" name="pegawai_id" required>
                            @foreach ($pegawai as $dta )
                            <option value="{{ $dta->id }}">{{ $dta->nama }}</option>
                            @endforeach
                        </select>
                        @error('pegawai_id')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">tanggal mulai</label>
                        <input type="date" name="tanggal_mulai" value="{{ $item->tanggal_mulai }}" class="form-control @error('tanggal_mulai')
                    form-control-danger
                    @enderror" required>
                        @error('tanggal_mulai')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">tanggal selesai</label>
                        <input type="date" name="tanggal_selesai" {{ $item->tanggal_selesai }} class="form-control @error('tanggal_selesai')
                    form-control-danger
                    @enderror" required>
                        @error('tanggal_selesai')
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
