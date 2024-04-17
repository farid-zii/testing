<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.jabatan.index",[
            "data"=>jabatan::get()
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
            "jabatan"=>"required",
            "gaji_pokok"=>"required",
        ]);


        jabatan::create([
            "gaji_pokok"=>str_replace(".","",$request->gaji_pokok),
            "jabatan"=>$request->jabatan,
        ]);

        return redirect("/dashboard/jabatan")->with("success","Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jabatan $jabatan)
    {
        return view("dashboard.jabatan.edit",[
            "data"=>jabatan::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            "jabatan"=>"required",
            "gaji_pokok"=>"required|integer"
        ]);

        jabatan::find($id)->update($validate);

        return redirect("/dashboard/jabatan")->with("success","Data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        jabatan::destroy($id);
        return redirect("/dashboard/jabatan")->with("success","Data berhasil di hapus");
    }
}
