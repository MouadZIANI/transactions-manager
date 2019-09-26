@extends('layouts.master')

@section('title', 'informations de client')

@section('content')

@include('layouts.partials._messages')

<div class="row">
	<div class="col-lg-3">
		<div class="card card-profile">
			<div class="card-header" style="background-color: #333"></div>
			<div class="card-body text-center">
				<img class="card-profile-img" src="{{ asset('assets/images/avatar5.png') }}">
				<h3 class="mb-3">{{ $client->user->fullName }}</h3>
				<p class="mb-4">
					<strong>{{ $client->user->email }}</strong>
					<br>
					<strong>{{ $client->phone_number }}</strong>
					<br>
				</p>
			</div>
			<div class="card-footer">
				<a class="btn btn-outline-success btn-block" href="{{ route('clients.edit', $client->id) }}" class="btn btn-success btn-sm">Edit</a>
			</div>	
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Transactions de client</h3>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-vcenter text-nowrap">
					<thead>
						<tr>
							<th>Destinataire</th>
							<th>E-mail</th>
							<th>Operateur</th>
							<th>Code de Transaction</th>
							<th>Total (DH)</th>
							<th>Date d'envoi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($client->transactions as $transaction)
							<tr>
								<td>{{ $transaction->to_name }}</td>
								<td>{{ $transaction->to_email }}</td>
								<td><span class="status-icon bg-success"></span> {{ $transaction->operator->name }}</td>
								<td>{{ $transaction->transaction_code }}</td>
								<td>{{ $transaction->total }}</td>
								<td>{{ dateToFrFormat($transaction->sent_at) }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
			</div>
		</div>
	</div>
</div>
@endsection