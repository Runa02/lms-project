<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JabatanController extends Controller
{
    public function index()
    {
        return view('jabatan.index');
    }

    public function show()
    {
        return DataTables::of(Jabatan::query())->make(true);
    }

    public function create()
    {
        return view('jabatan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string',
        ]);

        Jabatan::create([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('jabatan')->with('success', 'Jabatan ditambahkan!');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return response()->json($jabatan);
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->update($request->all());
        return response()->json(['success' => 'Jabatan updated successfully.']);
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        if ($jabatan) {
            $jabatan->delete();
            return response()->json(['success' => 'Jabatan deleted successfully.']);
        } else {
            return response()->json(['error' => 'Jabatan not found.'], 404);
        }
    }
}
