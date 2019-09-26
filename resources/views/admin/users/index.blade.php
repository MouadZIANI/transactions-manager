@extends('layouts.master')

@section('title', 'Liste des utilisateurs')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-users"></i> Liste utilisateurs</h1> 
	<a href="{{ route('users.create') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-user"></i> Nouveau utilisateur</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">

	<div class="card-header">
		<h3 class="card-title">Liste des utilisateurs</h3>
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
					<th>Date creation</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->fullName }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ dateToFrFormat($user->created_at) }}</td>
						<td>
							<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-outline-success btn-sm">
								<i class="fe fe-edit"></i>
							</a>
							<form method="post" style="display: inline-block;" action="{{ route('users.destroy', $user->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-outline-danger btn-sm"><i class="fe fe-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer text-right ml-auto">
		{!! $users->links() !!}
	</div>
</div>
@endsection