<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\In;
use Session;

class c_masuk extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
	{
		$items = Item::where('is_actived', '1')
		->get();
		$ins = In::where('is_actived', '1')
		->get();
		// $ins = In::all();
		// return $request;
		return view('masuk',compact('items', 'ins', 'ins'));
	}

	public function add(Request $request)
	{
    	// DB::table('ins')->insert(
     //         ['id_masuk' => $request->id_masuk,
     //         'tanggal' => $request->tanggal,
     //         'keterangan' => $request->keterangan,
     //     	'is_actived' => '1']
     //     );
		$items = Item::all();
		$ins = In::create($request->all());
		// $ins = In::all();
		$ins = In::where('is_actived', '1')
		->get();
		$item = Item::findOrFail($request->id_masuk);
		$item->jumlah += $request->jumlah;
		$item->save();
    	// return $request;
		return view('masuk', ['items' => $items, 'ins'=>$ins]);
	}

	public function softDelete($id)
	{
		DB::table('ins')->where('id',$id)
        ->update([
            'is_actived' => '0',
        ]);
        Session::flash('sukses','Data Berhasil Dihapus');
        return redirect('masuk');
	}

	public function edit($id)
	{
		$items = Item::where('is_actived', '1')
		->get();
		$ins = In::find($id);
		return view ('editmasuk', compact('ins','items'));
	}

	public function editProcess(Request $request,$id)
	{
		$ins = In::find($id);
		In::where('id', $id)
		->update([
			'id_masuk' => $request->id_masuk,
			'tanggal' => $request->tanggal,
			'jumlah' => $request->jumlah,
			'keterangan' => $request->keterangan
		]);
		Session::flash('sukses','Data Berhasil Diedit');
		return redirect('masuk');
	}
	
}
