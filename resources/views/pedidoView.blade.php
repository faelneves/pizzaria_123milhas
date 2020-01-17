@extends('default')

@section('content')


<div class="container">

	<form action="{{ route('createPedido') }}" method="post">
		@csrf
		<div class="row">
			<div class="col-sm">
				<select class="custom-select" name="nrcliente">
				    <option selected disabled>Cliente</option>
				  	@foreach ($data['clientes'] as $cliente)
					    <option value="{{ $cliente['id'] }}">{{ $cliente['nome'] }}</option>
				    @endforeach
				</select>
			</div>
			<div class="col-sm">
				<select class="custom-select" name="nrpizza">
					<option selected disabled>Pizza</option>
				  	@foreach ($data['pizzas'] as $pizza)
					    <option value="{{ $pizza['id'] }}">{{ $pizza['sabor']." - ".$pizza['tamanho'] }}</option>
				    @endforeach
				</select>
			</div>
			<div class="col-sm">
		    	<input type="submit" class="btn btn-primary btn-lg" value="Inserir Pedido">
		    </div>
		    <div class="col-sm">
				<a type="button" class="btn btn-secondary  btn-lg" href="{{  route('menuView')  }}" >Voltar</a>
		    </div>
		</div>
	</form>
	<br>
	<br>
	<div class="row">
		<div class="col-12">
			<table class="table table-hover table-dark">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Telefone</th>
			      <th scope="col">Pizza</th>
			      <th scope="col">Status</th>
			      <th scope="col">Valor</th>
			      <th scope="col"></th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach ($data['pedidos'] as $pedido)
			    	<tr>
				      <th scope="row">{{ $pedido['id'] }}</th>
				      <th>{{ $pedido['nome'] }}</th>
				      <th>{{ $pedido['telefone'] }}</th>
				      <th>{{ $pizza['sabor']." - ".$pizza['tamanho'] }}</th>
				      <th>{{ $pedido['status'] }}</th>
				      <th>{{ $pedido['valor'] }}</th>
				      <th><a type="button" class="btn btn-primary  btn-sm" href="{{  route('concluirPedido', ['id' => $pedido['id']])  }}" >Concluir Pedido</a></th>
				      <th><a type="button" class="btn btn-primary  btn-sm" href="{{  route('deletePedido', ['id' => $pedido['id']])  }}" >Excluir</a></th>
				    </tr>
				@endforeach
			    
			    
			  </tbody>
			</table>
		</div>
	</div>
</div>


@stop