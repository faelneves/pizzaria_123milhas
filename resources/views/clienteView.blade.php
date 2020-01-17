@extends('default')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-4">
			@if (isset($cliente))
			<form action="{{ route('updateCliente', ['id' => $cliente['id']]) }}" method="post">
				{!! method_field('PUT') !!}
			@else
			<form action="{{ route('createCliente') }}" method="post">
			@endif
				@csrf
				<input type="text" class="form-control" placeholder="Nome" name="nome" value="{{ $cliente->nome ?? '' }}">
				<br>
				<input type="text" class="form-control" placeholder="Telefone" name="telefone" value="{{ $cliente->telefone ?? '' }}">
				<br>
    			<input type="text" class="form-control" placeholder="CEP" name="CEP" value="{{ $cliente->CEP ?? '' }}">
    			<br>
    			<input type="text" class="form-control" placeholder="Rua" name="rua" value="{{ $cliente->rua ?? '' }}">
    			<br>
    			<input type="text" class="form-control" placeholder="Complemento" name="complemento" value="{{ $cliente->complemento ?? '' }}">
    			<br>

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
				      <th scope="col">Nome</th>
				      <th scope="col">Telefone</th>
				      <th scope="col">CEP</th>
				      <th scope="col">Rua</th>
				      <th scope="col">Complemento</th>
				      <th scope="col"></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach ($clientes as $cliente)
				    	<tr>
					      <th scope="row">{{ $cliente['id'] }}</th>
					      <th scope="row">{{ $cliente['nome'] }}</th>
					      <th scope="row">{{ $cliente['telefone'] }}</th>
					      <th scope="row">{{ $cliente['CEP'] }}</th>
					      <th scope="row">{{ $cliente['rua'] }}</th>
					      <th scope="row">{{ $cliente['complemento'] }}</th>
					      <th scope="row"><a type="button" class="btn btn-primary  btn-sm" href="{{  route('deleteCliente', ['id' => $cliente['id']])  }}" >Excluir</a></th>
					      <th scope="row"><a type="button" class="btn btn-primary  btn-sm" href="{{  route('editCliente', ['id' => $cliente['id']])  }}" >Editar</a></th>
					    </tr>
					@endforeach
				 </tbody>
			</table>
		</div>

	</div>
</div>

@stop