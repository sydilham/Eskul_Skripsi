<?php

namespace App\Http\Controllers;
use App\Models\Eskul;
use App\Models\PendaftaranEskul;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;

class EskulController extends Controller
{
    public function index()
    {
        $eskuls = Eskul::all();
        return view('admin.eskul.index', compact('eskuls'));
    }

    public function create()
    {
        return view('admin.eskul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required',
            'tempat' => 'required',
            'pembina' => 'required',
            'jadwal' => 'required',
        ]);

        Eskul::create($request->except('_token'));

        return redirect()->route('admin.eskul.index')->with('success', 'Eskul berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $eskuls = Eskul::find($id);

        return view('admin.eskul.edit', compact('eskuls'));
    }

    public function update(Request $request, $id)
    {
        $eskuls = Eskul::find($id);
        $eskuls->update($request->except('_token'));

        return redirect()->route('admin.eskul.index')->with('success', 'Eskul berhasil terupdate');
    }

    public function destory(Request $request, $id)
    {
        Eskul::find($id)->delete();

        return redirect()->route('admin.eskul.index')->with('success', 'Eskul berhasil terhapus');
    }
    
}
