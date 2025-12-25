<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\Books;

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
        $books = Books::all();
        return view("pinjam.create", compact("books"));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        "nama_peminjam" => "required|string",
        "kelas"         => "required|string",
        "kode_buku"     => "required|exists:books,kode_buku",
        "banyak_buku"   => "required|integer",
        "lama_meminjam" => "required|integer",
    ]);

    
    $book = Books::where('kode_buku', $request->kode_buku)->first();

    Peminjaman::create([
        'nama_peminjam' => $request->nama_peminjam,
        'kelas'         => $request->kelas,
        'nama_buku'     => $book->nama_buku, 
        'banyak_buku'   => $request->banyak_buku,
        'lama_meminjam' => $request->lama_meminjam,
        'email'         => $request->email ?? null,
    ]);

    return redirect()
        ->route('pinjam.create')
        ->with('success', 'Peminjaman berhasil disimpan');
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
