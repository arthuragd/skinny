@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Services</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('services.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Service</a>
		</div>
		<hr>
	</div><!-- end of row -->
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Raz Social</th>
					<th>Phone</th>
					<th>Seller</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($services as $service)
						<tr>
							<th>{{ $service->id }}</th>
							<td>{{ $service->name }}</td>
							<td>{{ $service->razsocial }}</td>
							<td>{{ $service->phone }}</td>
							<td>{{ $service->seller }}</td>
							<td><a href="{{ route('services.show',$service->id)}}" class="btn btn-info btn-sm">View</a> <a href="{{ route('services.edit',$service->id) }}" class="btn btn-primary btn-sm">Edit</a> </td>
						</tr>
					@endforeach					
				</tbody>
			</table>
			<div class="text-center">
				{!! $services->links(); !!}
			</div>
		</div>
	</div>

@stop