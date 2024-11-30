<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Carousel;
use App\Models\Galeri;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // setting
        $setting = Setting::pluck('value', 'nama_setting')->toArray(); // Ambil data sebagai key-value pair
        $data['dealer'] = $setting['dealer'] ?? '';
        $data['sales'] = $setting['sales'] ?? '';
        $data['no_wa'] = $setting['no_wa'] ?? '';
        $data['alamat'] = $setting['alamat'] ?? '';
        $data['instagram'] = $setting['instagram'] ?? '';
        $data['deskripsi'] = $setting['deskripsi'] ?? '';
        $data['footer'] = $setting['footer'] ?? '';

        $data['carousel'] = Carousel::all();
        $data['artikel'] = Artikel::all();
        return view('web.homepage', $data);
    }

    public function artikel()
    {
        // setting
        $setting = Setting::pluck('value', 'nama_setting')->toArray(); // Ambil data sebagai key-value pair
        $data['dealer'] = $setting['dealer'] ?? '';
        $data['sales'] = $setting['sales'] ?? '';
        $data['no_wa'] = $setting['no_wa'] ?? '';
        $data['alamat'] = $setting['alamat'] ?? '';
        $data['instagram'] = $setting['instagram'] ?? '';
        $data['deskripsi'] = $setting['deskripsi'] ?? '';
        $data['footer'] = $setting['footer'] ?? '';

        $data['artikel'] = Artikel::paginate(6);
        return view('web.artikel', $data);
    }

    public function galeri()
    {
        // setting
        $setting = Setting::pluck('value', 'nama_setting')->toArray(); // Ambil data sebagai key-value pair
        $data['dealer'] = $setting['dealer'] ?? '';
        $data['sales'] = $setting['sales'] ?? '';
        $data['no_wa'] = $setting['no_wa'] ?? '';
        $data['alamat'] = $setting['alamat'] ?? '';
        $data['instagram'] = $setting['instagram'] ?? '';
        $data['deskripsi'] = $setting['deskripsi'] ?? '';
        $data['footer'] = $setting['footer'] ?? '';

        $data['galeri'] = Galeri::paginate(9);
        return view('web.galeri', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
