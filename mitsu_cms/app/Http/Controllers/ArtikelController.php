<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data['artikel'] = Artikel::all();
        return view('admin.artikel', $data);
    }

    public function create()
    {
        return view('admin.tambah_artikel');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'meta_deskripsi' => 'nullable',
            'meta_keywords' => 'nullable',
            'gambar.*' => 'nullable|image|max:5048',
            'file' => 'nullable|file|max:20480', // Maksimal 20MB
        ], [
            'judul.unique' => 'Judul sudah ada.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 20MB.',
        ]);

        // Cek duplikat judul
        if (Artikel::where('judul', $request->judul)->exists()) {
            return redirect()->back()->with('error', 'Judul sudah ada');
        }

        // Buat artikel baru
        $data = new Artikel();
        $data->judul = $request->judul;
        $data->slug = Str::slug($request->judul);
        $data->deskripsi = $request->deskripsi;
        $data->tanggal = $request->tanggal;
        $data->meta_deskripsi = $request->meta_deskripsi;
        $data->meta_keywords = $request->meta_keywords;
        $data->user_id = auth()->id();
        $data->view_count = 0;

        $uploadedImages = json_decode($request->uploaded_images, true);
        $finalPaths = [];
        foreach ($uploadedImages as $image) {
            $tempPath = public_path("artikel/temp/{$image}");
            $finalPath = public_path("artikel/gambar/{$image}");

            if (file_exists($tempPath)) {
                rename($tempPath, $finalPath); // Pindahkan file
                $finalPaths[] = $image;
            }
        }
        $data->gambar = json_encode($finalPaths);

        // Proses unggahan file (single)
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('artikel/file'), $fileName);
            $data->file = $fileName;
        }

        $data->save();

        return redirect()->route('artikel')->with('success', 'Artikel berhasil diunggah');
    }


    public function edit($id)
    {
        $data ['artikel'] = Artikel::findOrFail($id);
        return view('admin.edit_artikel', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'file' => 'nullable|file',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|max:5048',
        ]);

        // Cek duplikat judul
        if (Artikel::where('judul', $request->judul)->exists()) {
            return redirect()->back()->with('error', 'Judul sudah ada');
        }

        $artikel = Artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->slug = Str::slug($request->judul);
        $artikel->deskripsi = $request->deskripsi;
        $artikel->tanggal = $request->tanggal;

        // Gambar Baru
        if ($request->hasFile('gambar')) {
            $newImages = [];
            foreach ($request->file('gambar') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('artikel/gambar'), $fileName);
                $newImages[] = $fileName;
            }

            // Hapus gambar lama
            if ($artikel->gambar) {
                foreach (json_decode($artikel->gambar, true) as $oldImage) {
                    $oldPath = public_path('artikel/gambar/' . $oldImage);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }

            $artikel->gambar = json_encode($newImages);
        }

        // File Baru
        if ($request->hasFile('file')) {
            if ($artikel->file) {
                $oldFilePath = public_path('file/' . $artikel->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('file'), $fileName);
            $artikel->file = $fileName;
        }

        $artikel->save();

        return redirect()->route('artikel')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel')->with('success', 'Artikel berhasil dihapus');
    }

    public function uploadTemporaryImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:5048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('artikel/gambar'), $fileName);

        return response()->json(['fileName' => $fileName, 'filePath' => '/artikel/gambar/' . $fileName]);
    }

    // // Menampilkan postingan berdasarkan slug
    // public function show($slug)
    // {
    //     $artikel = Post::where('slug', $slug)->firstOrFail();
    //     $metaData = $artikel->getMetaData();

    //     return view('posts.show', compact('artikel', 'metaData'));
    // }
}
