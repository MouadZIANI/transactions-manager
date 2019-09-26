@extends('layouts.master')

@section('title', 'Liste des clients')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-users"></i> Liste Clients</h1> 
	<a href="{{ route('clients.create') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-user"></i> Nouveau client</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">

	<div class="card-header">
		<h3 class="card-title">Liste des clients</h3>
		<div class="card-options">
			<form class="input-icon my-3 my-lg-0" method="post">
				@csrf
				<input type="search" class="form-control input-searche-card header-search" placeholder="Search…" tabindex="1" name="searched_query">
				<div class="input-icon-addon">
					<i class="fe fe-search"></i>
				</div>
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table card-table table-vcenter text-nowrap">
			<thead>
				<tr>
					<th>Nom</th>
					<th>E-mail</th>
					<th>Tel</th>
					<th>Date creation</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($clients as $client)
					<tr>
						<td>{{ $client->user->fullName }}</td>
						<td>{{ $client->user->email }}</td>
						<td>{{ $client->phone_number }}</td>
						<td>{{ dateToFrFormat($client->created_at) }}</td>
						<td>
							<a href="{{ route('clients.edit', ['id' => $client->id]) }}" class="btn btn-outline-success btn-sm">
								<i class="fe fe-edit"></i>
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('clients.destroy', $client->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-outline-danger btn-sm"><i class="fe fe-trash"></i></button>
							</form>
							<a href="{{ route('clients.show', ['id' => $client->id]) }}" class="btn btn-outline-info btn-sm">
								<i class="fe fe-eye"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer text-right ml-auto">
			{!! $clients->links() !!}
	</div>
</div>
@endsection