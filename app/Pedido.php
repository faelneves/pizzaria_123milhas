<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function pizza()
	{
		return $this->hasOne(Pizza::class, 'id' , 'nrpizza');
	}

	public function cliente()
	{
		return $this->hasOne(Cliente::class, 'id' , 'nrcliente');
	}
}
