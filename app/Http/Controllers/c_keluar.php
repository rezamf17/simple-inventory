<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Out;
use Session;

class c_keluar extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{ 
		$items = Item::where('is_actived', '1')
		->get();
		$outs = Out::where('is_actived', '1')
		->get();
		// $outs = Out::all();
		return view('keluar', compact('items', 'outs', 'outs'));
	}

	public function add(Request $request)
	{
		$items = Item::where('is_actived', '1')
		->get();
		$outs = Out::create($request->all());
		$outs = Out::where('is_actived', '1')
		->get();
		$item = Item::findOrFail($request->id_keluar);
		$item->jumlah -= $request->jumlah;
		$item->save();
    	// return $request;
    	// Session::flash('sukses','Data Keluar Berhasil Ditambahkan');
		return view('keluar', compact('items', 'outs', 'item'));
	}

	public function softDelete($id)
	{
		DB::table('outs')->where('id',$id)
        ->update([
            'is_actived' => '0',
        ]);
        Session::flash('sukses','Data Berhasil Dihapus');
        return redirect('keluar');
	}

	public function edit($id)
	{
		$items = Item::where('is_actived', '1')
		->get();
		$outs = Out::find($id);
		return view ('editkeluar', compact('outs','items'));
	}

	public function editProcess(Request $request,$id)
	{
		$outs = Out::find($id);
		Out::where('id', $id)
		->update([
			'id_keluar' => $request->id_keluar,
			'tanggal' => $request->tanggal,
			'jumlah' => $request->jumlah,
			'keterangan' => $request->keterangan
		]);
		Session::flash('sukses','Data Berhasil Diedit');
		return redirect('keluar');
	}
   
}
