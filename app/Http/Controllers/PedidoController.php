<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Cliente;
use App\Pizza;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPedidos()
    {
        $data = $this->createData();
        return View('pedidoView')->with('data', $data);
    }

    public function createData()
    {
        $clientes = Cliente::all();
        $pizzas = Pizza::all();
        $pedidos = Pedido::all(); 
        $data['pedidos'] = array();

        foreach ($pedidos as $pedido) {
            $cliente = $pedido->cliente()->first();
            $pizza = $pedido->pizza()->first();
            $data['pedidos'][] = array_merge( $cliente->attributesToArray(), $pizza->attributesToArray(),$pedido->attributesToArray(),);
        }

        $data['clientes'] = $clientes;
        $data['pizzas'] = $pizzas;
        return $data;
    }

    public function createPedido(Request $request)
    {
        if ($request->nrpizza && $request->nrcliente) {
            $pedido = new Pedido();
            $pedido->nrpizza = $request->nrpizza;
            $pedido->nrcliente = $request->nrcliente;
            $pedido->status = "em andamento";

            $pedido->save();
        }else {
            $this->alert('Preencha Todos os Campos Corretamente!');
        }
        $data = $this->createData();
        return view('pedidoView')->with('data', $data);
    }

     public function deletePedido($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        return redirect()->route('showPedidos');
    }

    public function concluirPedido($id)
    {
        $pedido = Pedido::find($id);
        $pedido->status = "concluido";
        $pedido->save();
        return redirect()->route('showPedidos');
    }
    
}
