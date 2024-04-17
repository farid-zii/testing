@extends("main")
@section('content')
<div class="container-fluid" id="container-wrapper">

    <!-- Row -->
    <div class="row">
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Pegawai</h3>
            <button class="btn btn-primary" data-toggle="modal"
            data-target="#add-jabatan">+ Create</button>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Nomor Induk</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Nomor Induk</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $index=>$dta)
                <tr>
                    <td>{{ $index +1 }}</td>
                    <td><img src="{{asset('images/foto/'.$dta->foto)}}" width="100px" height="150px"></td>
                    <td>{{ $dta->nama }}</td>
                    <td>{{ $dta->nomor_induk }}</td>
                    <td>{{carbon\carbon::parse($dta->tgl_lahir)->isoFormat('DD-MM-YYYY')}}</td>
                    <td>{{ $dta->alamat }}</td>
                    <td>
                        <div>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-{{$dta->id}}"><i class="bi bi-pencil-square"></i></button>
                            <form method="post" id="myForm" class="d-inline">
                                @csrf
                                @method('delete')
                            <a onclick="hapus('pegawai',{{$dta->id}})" class="btn btn-danger"><i class="bi bi-trash"></i></i></a>
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>



  @include('dashboard.pegawai.create')
@include('dashboard.pegawai.edit')

@endsection
