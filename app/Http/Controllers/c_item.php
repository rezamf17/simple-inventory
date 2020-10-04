<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\In;
use Session;

class c_item extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read()
    {
    	$items = DB::table('items')
    	->where('is_actived', '1')
    	->get();
    	return view('barang', compact('items'));
    }

    public function add(Request $request)
    {
    	$request->validate([
             'nama_barang' => 'required',
             'jumlah' => 'integer',
         ],[
             'name.required' => 'Isi nama barang'
         ]);
    	DB::table('items')->insert(
             ['nama_barang' => $request->nama_barang,
             'jumlah' => $request->jumlah,
         	'is_actived' => '1']
         );
    	Session::flash('sukses','Data Berhasil Ditambahkan');
    	return redirect('barang');
    	// return $request;
    }

    public function edit($id)
    {
        $items = DB::table('items')
        ->where('is_actived', '1')
        ->get();
        $items = Item::find($id);
        return view('editbarang', compact('items'));
    }

    public function editProcess(Request $request, $id)
    {
        $items = Item::find($id);
        Item::where('id', $id)
        ->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
        ]);
        Session::flash('sukses','Data Berhasil Diedit');
        return redirect('barang');
    }

    public function softDelete(Request $request, $id)
    {
    	DB::table('items')->where('id',$id)
        ->update([
            'is_actived' => '0',
        ]);
        Session::flash('sukses','Data Berhasil Dihapus');
        return redirect('barang');
    }

    public function delete($id)
    {
    	Session::flash('sukses','Data Berhasil Dihapus');
    	DB::table('items')->where('id', $id)->delete();
        return redirect('barang');
    }
}
