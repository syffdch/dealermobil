<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\TipeMobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $data['mobil'] = Mobil::all();
        return view('admin.mobil', $data);
    }

    public function mobil_create()
    {
        $data['tipe'] = TipeMobil::all();
        return view('admin.tambah_mobil', $data);
    }

    public function mobil_store(Request $request)
    {
        
    }
    
    public function dtmobil_create()
    {
        return view('admin.tambah_dtMobil');
    }

    public function dtmobil_store(Request $request)
    {
        
    }

    public function edit($id)
    {
        return view('admin.edit_mobil');
    }

    public function update(Request $request, $id)
    {
        
    }
    
    public function destroy($id)
    {
        //
    }
}
