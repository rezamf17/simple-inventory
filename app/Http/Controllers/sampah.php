<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Out;
use App\In;
use App\Item;
use Session;

class sampah extends Controller
{
    public function keluar()
    {
    	$outs = Out::where('is_actived' , '0')
    	->get();
    	return view('sampah.sampahkeluar', compact('outs'));
    }

    public function hapusKeluar($id)
    {
    	Session::flash('sukses','Data Berhasil Dihapus');
    	DB::table('outs')->where('id', $id)->delete();
        return redirect('sampah/sampahkeluar');
    }

    public function restoreKeluar($id)
    {
    	DB::table('outs')->where('id',$id)
        ->update([
            'is_actived' => '1',
        ]);
        Session::flash('sukses','Data Berhasil Dikembali');
        return redirect('sampah/sampahkeluar');
    }

    public function masuk()
    {
    	$ins = In::where('is_actived' , '0')
    	->get();
    	return view('sampah.sampahmasuk', compact('ins'));
    }

    public function hapusMasuk($id)
    {
    	Session::flash('sukses','Data Berhasil Dihapus');
    	DB::table('ins')->where('id', $id)->delete();
        return redirect('sampah/sampahmasuk');
    }

    public function restoreMasuk($id)
    {
    	DB::table('ins')->where('id',$id)
        ->update([
            'is_actived' => '1',
        ]);
        Session::flash('sukses','Data Berhasil Dikembali');
        return redirect('sampah/sampahmasuk');
    }

    public function barang()
    {
    	$items = Item::where('is_actived' , '0')
    	->get();
    	return view('sampah.sampahbarang', compact('items'));
    }

     public function hapusBarang($id)
    {
    	Session::flash('sukses','Data Berhasil Dihapus');
    	DB::table('items')->where('id', $id)->delete();
        return redirect('sampah/sampahbarang');
    }

    public function restoreBarang($id)
    {
    	DB::table('items')->where('id',$id)
        ->update([
            'is_actived' => '1',
        ]);
        Session::flash('sukses','Data Berhasil Dikembali');
        return redirect('sampah/sampahbarang');
    }
}
