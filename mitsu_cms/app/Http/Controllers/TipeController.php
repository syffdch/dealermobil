<?php

namespace App\Http\Controllers;

use App\Models\TipeMobil;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index()
    {
        $data['tipe'] = TipeMobil::all();
        return view('admin.tipe', $data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'tipe'  => 'required',
        ]);

        if (TipeMobil::where('tipe', $request->tipe)->exists()) {
            return redirect()->back()->with('error', 'Tipe sudah terdaftar');
        }
        $data = new TipeMobil();
        $data->tipe = $request['tipe'];
        $data->save();

        return redirect()->route('tipe')->with('success', 'Tipe berhasil ditambahkan');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'tipe'  => 'required',
        ]);

        $id = $request->tipe_id;
        $tipe = TipeMobil::findOrFail($id);

        if (TipeMobil::where('tipe', $request->tipe)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->with('error', 'Tipe sudah terdaftar');
        }
        $tipe->tipe = $request['tipe'];
        $tipe->update();

        return redirect()->route('tipe')->with('success', 'Tipe berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tipe = TipeMobil::findOrFail($id);
        $tipe->delete();

        return redirect()->route('tipe')->with('success', 'Tipe berhasil dihapus');
    }
}
