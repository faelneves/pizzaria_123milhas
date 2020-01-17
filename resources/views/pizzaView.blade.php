@extends('default')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-4">
			@if (isset($pizza))
			<form action="{{ route('updatePizza', ['id' => $pizza['id']]) }}" method="post">
				{!! method_field('PUT') !!}
			@else
			<form action="{{ route('createPizza') }}" method="post">
			@endif
				@csrf
				<input type="text" class="form-control" placeholder="Sabor" name="sabor" value="{{ $pizza->sabor ?? '' }}">
				<br>
				<input type="text" class="form-control" placeholder="Tamanho" name="tamanho" value="{{ $pizza->tamanho ?? '' }}">
				<br>
    			<input type="number" step="0.01" class="form-control" placeholder="Valor R$" name="valor" value="{{ $pizza->valor ?? '' }}">

				<br>
				<a type="button" class="btn btn-secondary  btn-lg" href="{{  route('menuView')  }}" >Voltar</a>
				<input type="submit" class="btn btn-primary btn-lg" value="   Salvar   ">
			</form>
		</div>
		<div class="col-8">
			<table class="table table-hover table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Sabor</th>
				      <th scope="col">Tamanho</th>
				      <th scope="col">Valor</th>
				      <th scope="col"></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach ($pizzas as $pizza)
				    	<tr>
					      <th scope="row">{{ $pizza['id'] }}</th>
					      <th scope="row">{{ $pizza['sabor'] }}</th>
					      <th scope="row">{{ $pizza['tamanho'] }}</th>
					      <th scope="row">{{ $pizza['valor'] }}</th>
					      <th scope="row"><a type="button" class="btn btn-primary  btn-sm" href="{{  route('deletePizza', ['id' => $pizza['id']])  }}" >Excluir</a></th>
					      <th scope="row"><a type="button" class="btn btn-primary  btn-sm" href="{{  route('editPizza', ['id' => $pizza['id']])  }}" >Editar</a></th>
					    </tr>
					@endforeach
				 </tbody>
			</table>
		</div>

	</div>
</div>

@stop