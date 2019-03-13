<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientProduct extends Model
{
    //
    protected $table = 'client_products';
    protected $fillable = ['product_id', 'client_id'];
    public function Product()
	{
		return $this->belongsTo('App\Product','product_id');
	}
}

