@extends('layouts.app')

@section('content')

	
	<div class="row">
		<div class="col-md-10">
			<h1>All Bills</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('bills.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Bill</a>
		</div>
		<hr>
	</div><!-- end of row -->
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Datr</th>
					<th>Value</th>
					<th>Service</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($bills as $bill)
						<tr>
							<th>{{ $bill->id }}</th>
							<td>{{ $bill->date }}</td>
							<td>{{ $bill->value }}</td>
							<td>{{ $bill->service->name }}</td>
							<td><a href="{{ route('bills.show',$bill->id)}}" class="btn btn-info btn-sm">View</a> <a href="{{ route('bills.edit',$bill->id) }}" class="btn btn-primary btn-sm">Edit</a> </td>
						</tr>
					@endforeach					
				</tbody>
			</table>
			<div class="text-center">
				{!! $bills->links(); !!}
			</div>
		</div>
	</div>

@stop