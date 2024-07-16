<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    public function index()
    {
        return view('datasiswa.index');
    }

    public function datasiswa(Request $request)
    {
        return DataTables::of(Siswa::query())->make(true);
    }

    public function create()
    {
        return view('datasiswa.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'nis' => 'required',
            'username' => 'required|string',
            'name' => 'required|string',
            'kelas' => 'required|string',
            'password' => 'nullable|string',
        ]);

        $image = $request->file('image')->store('images', 'public');

        Siswa::create([
            'image' => $image,
            'nis' => $request->nis,
            'username' => $request->username,
            'name' => $request->name,
            'kelas' => $request->kelas,
            'password' => $request->password,
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa baru ditambahkan!');
    }
}
