<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';
    protected $fillable = ['id','nama_barang', 'jumlah', 'is_actived'];
}
