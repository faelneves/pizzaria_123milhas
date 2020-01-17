<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPizzas()
    {
        $pizzas = Pizza::all();
        return view('pizzaView')->with(compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPizza(Request $request)
    {
        if ($request->sabor && $request->tamanho && $request->valor ) {
            $pizza = new Pizza();
            $pizza->sabor = $request->sabor;
            $pizza->tamanho = $request->tamanho;
            $pizza->valor = $request->valor;
            $pizza->save();
            return redirect()->route('showPizzas');
        } else{
            $this->alert('Preencha Todos os Campos Corretamente!');
            return redirect()->route('showPizzas');
        }
    }

    public function deletePizza($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();
        return redirect()->route('showPizzas');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function editPizza($id)
    {
        $pizza = Pizza::find($id);
        $pizzas = Pizza::all();
        return view('pizzaView')->with(compact('pizzas', 'pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function updatePizza(Request $request, $id)
    {
         if ($request->nome && $request->telefone && $request->CEP && $request->rua) {
            $pizza = Pizza::find($id);
            $pizza->sabor = $request->sabor;
            $pizza->tamanho = $request->tamanho;
            $pizza->valor = $request->valor;
            $pizza->save();
            return redirect()->route('showPizzas');
        } else{
            $this->alert('Preencha Todos os Campos Corretamente!');
            return redirect()->route('showPizzas');
        }
    }
}
