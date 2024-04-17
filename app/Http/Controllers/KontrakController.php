<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\kontrak;
use App\Models\pegawai;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.kontrak.index",[
            "data"=>kontrak::latest()->get(),
            "pegawai"=>pegawai::get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "pegawai_id"=>"required",
            "tanggal_mulai"=>"required",
            "tanggal_selesai"=>"required",
        ]);


        kontrak::create($validate);

        return redirect("/dashboard/kontrak")->with("success","Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(kontrak $kontrak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kontrak $kontrak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "pegawai_id"=>"required",
            "tanggal_mulai"=>"required",
            "tanggal_selesai"=>"required",
        ]);


        kontrak::find($id)->update($validate);

        return redirect("/dashboard/kontrak")->with("success","Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        kontrak::destroy($id);
        return redirect("/dashboard/kontrak")->with("success","Data berhasil diupdate");
    }
}
