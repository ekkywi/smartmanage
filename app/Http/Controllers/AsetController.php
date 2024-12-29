<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function aset()
    {
        $asets = Aset::all();
        return view('aset', compact('asets'));
    }

    public function update(Request $request)
    {
        $aset = Aset::find($request->id);
        $aset->kode_aset = $request->kode_aset;
        $aset->nama = $request->nama;
        $aset->jenis = $request->jenis;
        $aset->merk = $request->merk;
        $aset->tipe = $request->tipe;
        $aset->tahun_beli = $request->tahun_beli;
        $aset->nilai_beli = $request->nilai_beli;
        $aset->keterangan = $request->keterangan;
        $aset->save();

        return redirect()->route('aset')->with('success', 'Data aset sukses diupdate');
    }

    public function destroy(Request $request)
    {
        $aset = Aset::find($request->id);
        if ($aset) {
            $aset->delete();
            return redirect()->route('aset')->with('success', 'Data Aset berhasil dihapus');
        }
        return redirect()->route('aset')->with('error', 'Aset tidak ditemukan');
    }
}
