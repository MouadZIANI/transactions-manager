@extends('layouts.master')

@section('title', 'Liste des transactions')

@section('page-title') 
	<h1 class="page-title"><i class="fe fe-bell"></i> Mes Transactions</h1> 
	<a href="{{ route('transactions.create') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-plus-circle"></i> Nouvelle transactions</a>
@endsection

@section('content')

@include('layouts.partials._messages')

<div class="card">

	<div class="card-header">
		<h3 class="card-title">Mes Transactions</h3>
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
					<th>Nom de destinataire</th>
					<th>E-mail</th>
					<th>Tel</th>
					<th>Operateur</th>
					<th>Code de Transaction</th>
					<th>Total (DH)</th>
					<th>Date d'envoi</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($transactions as $transaction)
					<tr>
						<td>{{ $transaction->to_name }}</td>
						<td>{{ $transaction->to_email }}</td>
						<td>{{ $transaction->to_phone_number }}</td>
						<td><span class="status-icon bg-success"></span> {{ $transaction->operator->name }}</td>
						<td>{{ $transaction->transaction_code }}</td>
						<td>{{ $transaction->total }}</td>
						<td>{{ dateToFrFormat($transaction->sent_at) }}</td>
						<td>
							<form method="post" style="display: inline-block;" action="{{ route('transactions.destroy', $transaction->id) }}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger btn-sm"><i class="fe fe-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer text-right ml-auto">
			{!! $transactions->links() !!}
	</div>
</div>
@endsection