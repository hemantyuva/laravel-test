@extends('app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1> Products </h1>

				{{ Form::open(['id' => 'create-product']) }}
				  <div class="form-group">
				    {{ Form::label('product_name','Product name') }}
				    
				    {{ Form::input('text','product_name','',['class' => 'form-control','required']) }}
				  </div>
				  <div class="form-group">
				    {{ Form::label('quantity_in_stock','Quantity in stock') }}
				    
				    {{ Form::input('number','quantity_in_stock','',['class' => 'form-control','required']) }}
				  </div>
				  <div class="form-group">
				    {{ Form::label('price_per_item','Price per item') }}
				    
				    {{ Form::input('number','price_per_item','',['class' => 'form-control','required']) }}
				  </div>
				    				    
				    {{ Form::submit('Submit',['class' => 'btn btn-info']) }}
				  
				{{ Form::close() }}
			
			</div>
			
		</div>
		
		<table class="table table-striped">
			<thead>
			  <tr>
			    <th>Product name</th>
			    <th>Quantity in stock</th>
			    <th>Price per item</th>
			    <th>Datetime submitted</th>
			    <th>Total value number</th>
			  </tr>
			</thead>
			<tbody id="product-list">
				@foreach( $products as $product )	
				  <tr>
				    <td>{{ $product->product_name }}</td>
				    <td>{{ $product->quantity_in_stock }}</td>
				    <td>{{ $product->price_per_item }}</td>
				    <td>{{ $product->datetime_submited }}</td>
				    <td>{{ ($product->quantity_in_stock * $product->price_per_item) }}</td>
				  </tr>
				@endforeach  
			</tbody>
		</table>
	</div>

@endsection