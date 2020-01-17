@extends('default')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg">
			<a type="button" class="btn btn-primary btn-lg btn-block" href="{{  route('showClientes')  }}">Cliente</a>
		</div>
		<div class="col-lg">
			<a type="button" class="btn btn-secondary btn-lg btn-block" href="{{  route('showPedidos')  }}" >Pedidos</a>
		</div>
		<div class="col-lg">
			<a type="button" class="btn btn-primary btn-lg btn-block" href="{{  route('showPizzas')  }}" >Pizzas</a>
		</div>
	</div>
</div>

@stop