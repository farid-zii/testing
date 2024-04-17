@foreach ($data as $item)

<div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/dashboard/user/{{$item->id }}" method="post">
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
                        <label for="" class="text-capitalize">name</label>
                        <input type="text" name="name" value="{{ $dta->name }}" class="form-control @error('name')
                    form-control-danger
                    @enderror" required>
                        @error('name')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">email</label>
                        <input type="text" name="email" value="{{ $dta->email }}" class="form-control @error('email')
                    form-control-danger
                    @enderror" required>
                        @error('email')
                        <div class="form-control-feedback text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-capitalize">password</label>
                        <input type="password" name="password"  class="form-control @error('password')
                    form-control-danger
                    @enderror" required>
                        @error('password')
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
