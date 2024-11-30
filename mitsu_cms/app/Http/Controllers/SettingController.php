<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::all();
        $data['carousel'] = Carousel::all();
        return view('admin.setting', $data);
    }

    public function setting(Request $request)
    {
        $request->validate([
            'dealer'    => 'required',
            'sales'     => 'required',
            'no_wa'     => 'required',
            'alamat'    => 'required',
            'instagram' => 'nullable',
            'deskripsi' => 'nullable',
            'footer'    => 'nullable',
        ]);
        foreach ($request->except('_token') as $nama_setting => $value) {
            Setting::where('nama_setting', $nama_setting)->update(['value' => $value]);
        }

        return redirect()->back()->with('success', 'Setting berhasil diperbarui.');
    }

    public function carousel(Request $request) {
        $request->validate([
            'judul' => 'required',
            'foto'  => 'required|image|max:5240'
        ], [
            'foto.max' => 'Ukuran file tidak boleh lebih dari 5MB.',
        ]);

        if (Carousel::where('judul', $request->judul)->exists()) {
            return redirect()->back()->with('error', 'Judul sudah ada');
        }

        // Validasi rasio 16:9 menggunakan library gambar
        $image = getimagesize($request->file('foto'));
        if ($image[0] / $image[1] !== 16 / 9) {
            return redirect()->back()->with('error', 'Foto harus memiliki rasio 16:9.');
        }

        $data = new Carousel();
        $data->judul = $request['judul'];
        if ($request->hasFile('foto')) {
            $NamaFoto = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('carousel'), $NamaFoto);
        }
        $data->foto = $NamaFoto;
        $data->save();

        return redirect()->back()->with('success', 'Carousel berhasil ditambah.');
    }

    public function carousel_destroy($id) {
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();

        return redirect()->back()->with('success', 'Carousel berhasil dihapus.');
    }
}
