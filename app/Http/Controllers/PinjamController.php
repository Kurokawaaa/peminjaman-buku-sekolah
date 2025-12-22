<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;

use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pinjam.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            "nama_peminjam"=> "required|string",
            "kelas"=> "required|string",
            "nama_buku"=> "required|string",
            "banyak_buku"=> "required|integer",
            "lama_meminjam"=> "required|integer"
        ]); 

        Peminjaman::create($validate);

        return redirect()->route("pinjam.create")->with("success","Peminjaman Sukses!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
