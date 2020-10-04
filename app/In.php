<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In extends Model
{
	protected $table = 'ins';
    protected $fillable = ['id', 'id_masuk', 'tanggal', 'jumlah','is_actived', 'keterangan'];
    protected $attributes = ['is_actived' => '1'];

    public function data()
    {
        return $this->belongsTo('App\Item', 'id_masuk');
    }
}
