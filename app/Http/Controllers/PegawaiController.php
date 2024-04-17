<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\pegawai;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pegawai.index",[
            "data"=>pegawai::get(),
            "jabatan"=>jabatan::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama"=>"required",
            "tgl_lahir"=>"required|date",
            "foto"=>"required|mimes:png,jpg|max:100",
            "alamat"=>"required",
            "jabatan_id"=>"required",
        ]);

        $namaFoto = time().'-'.$request->foto->getClientOriginalName();
        $request->foto->move(public_path('/images/foto'),$namaFoto);
        $validate['foto']=$namaFoto;

        pegawai::create($validate);

        return redirect("/dashboard/pegawai")->with("success","Data Pegawai Berhasil ditambahkan");

        // return "Data Pegawai Berhasil Ditambahkan";
    }

    /**
     * Display the specified resource.
     */
    public function show(pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "nama"=>"required",
            "tgl_lahir"=>"required|date",
            "alamat"=>"required",
            "jabatan_id"=>"required",
        ]);

        if($request->foto){
            $lama = pegawai::find($id);
            File::delete('backend/images/foto-anggota/'.$lama->foto);
            $namaFoto = time().'-'.$request->foto->getClientOriginalName();
            $request->foto->move(public_path('images/foto'),$namaFoto);
            $validate['foto']=$namaFoto;
        }

        pegawai::find($id)->update($validate);

        return redirect("/dashboard/pegawai")->with("success","Data Pegawai Berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lama = pegawai::find($id);
        File::delete('images/foto/'.$lama->foto);
        pegawai::destroy($id);
        return redirect("/dashboard/pegawai")->with("success","Data berhasil di hapus");
    }
}
