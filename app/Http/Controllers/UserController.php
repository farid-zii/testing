<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.user.index",[
            "data"=>user::get()
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
        $validate= $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required|min:6",
        ]);

        $validate["password"]=bcrypt($request->password);

        user::create($validate);

        return redirect("/dashboard/user")->with("success","Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate= $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required|min:6",
        ]);

        $validate["password"]=bcrypt($request->password);

        user::find($id)->update($validate);

        return redirect("/dashboard/user")->with("success","Data berhasil ditambahkan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        user::destroy($id);

        return redirect("/dashboard/user")->with("success","Data berhasil dihapus");
    }
}
