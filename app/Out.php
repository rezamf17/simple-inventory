<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
    protected $table = 'outs';
    protected $fillable = ['id', 'id_keluar', 'tanggal', 'jumlah', 'keterangan', 'is_actived'];
    protected $attributes = ['is_actived' => '1'];

    public function keluar()
    {
    	return $this->belongsTo('App\Item', 'id_keluar');
    }
}
