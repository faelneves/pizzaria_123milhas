<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showClientes()
    {
        $clientes = Cliente::all();
        return view('clienteView')->with(compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCliente(Request $request)
    {
        if ($request->nome && $request->telefone && $request->CEP && $request->rua) {
            $cliente = new Cliente();
            $cliente->nome = $request->nome;
            $cliente->telefone = $request->telefone;
            $cliente->CEP = $request->CEP;
            $cliente->rua = $request->rua;
            if ($request->complemento) {
                $cliente->complemento = $request->complemento;
            }
            $cliente->save();
            return redirect()->route('showClientes');
        } else{
            $this->alert('Preencha Todos os Campos Corretamente!');
            return redirect()->route('showClientes');
        }
    }

    public function deleteCliente($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('showClientes');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function editCliente($id)
    {
        $cliente = Cliente::find($id);
        $clientes = Cliente::all();
        return view('clienteView')->with(compact('clientes', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function updateCliente(Request $request, $id)
    {
         if ($request->nome && $request->telefone && $request->CEP && $request->rua) {
            $cliente = Cliente::find($id);
            $cliente->nome = $request->nome;
            $cliente->telefone = $request->telefone;
            $cliente->CEP = $request->CEP;
            $cliente->rua = $request->rua;
            if ($request->complemento) {
                $cliente->complemento = $request->complemento;
            }
            $cliente->save();
            return redirect()->route('showClientes');
        } else{
            $this->alert('Preencha Todos os Campos Corretamente!');
            return redirect()->route('showClientes');
        }
    }

}
