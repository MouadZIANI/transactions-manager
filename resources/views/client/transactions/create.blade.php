@extends('layouts.master')

@section('title', 'Nouvelle transaction')

@section('page-title')
	<h1 class="page-title"><i class="fe fe-plus-circle"></i> Nouvelle transaction</h1>
	<a href="{{ route('transactions.index') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-bell"></i> liste des transactions</a>
@endsection

@section('content')
<div class="card">
	<div class="card-status bg-blue"></div>
	<div class="card-header">
		<h3 class="card-title">Ajouter nouvelle transaction</h3>
	</div>
	<form method="post" action="{{ route('transactions.store') }}">
		<div class="card-body">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="form-label">Nom de destinataire</label>
				<input type="text" name="to_name" class="form-control {{ $errors->has('to_name') ? ' is-invalid' : '' }}" placeholder="Nom de destinataire" value="{{ old('to_name') }}" required />
				@if ($errors->has('to_name'))
					<div class="invalid-feedback">{{ $errors->first('to_name') }}</div>
				@endif
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">E-mail de destinataire</label>
						<input type="text" name="to_email" class="form-control {{ $errors->has('to_email') ? ' is-invalid' : '' }}" placeholder="E-mail de destinataire" value="{{ old('to_email') }}" required />
						@if ($errors->has('to_email'))
							<div class="invalid-feedback">{{ $errors->first('to_email') }}</div>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Tel de destinataire</label>
						<input type="tel" name="to_phone_number" class="form-control {{ $errors->has('to_phone_number') ? ' is-invalid' : '' }}" placeholder="Tel de destinataire" value="{{ old('to_phone_number') }}" required />
						@if ($errors->has('to_phone_number'))
							<div class="invalid-feedback">{{ $errors->first('to_phone_number') }}</div>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Montant en (DH)</label>
						<input type="text" name="total" class="form-control {{ $errors->has('total') ? ' is-invalid' : '' }}" placeholder="Montant en (DH)" value="{{ old('total') }}" required />
						@if ($errors->has('total'))
							<div class="invalid-feedback">{{ $errors->first('total') }}</div>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Date d'envoi</label>
						<input type="date" name="sent_at" class="form-control {{ $errors->has('sent_at') ? ' is-invalid' : '' }}" value="{{ old('sent_at') }}" required />
						@if ($errors->has('sent_at'))
							<div class="invalid-feedback">{{ $errors->first('sent_at') }}</div>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Operateur</label>
                        <select name="operator_id" class="form-control custom-select {{ $errors->has('operator_id') ? ' is-invalid' : '' }}">
                          @foreach ($operators as $operator)
                          	<option {!! old('operator_id') == $operator->id ? "selected" : '' !!} value="{{ $operator->id }}">{{ $operator->name }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('operator_id'))
							<div class="invalid-feedback">{{ $errors->first('operator_id') }}</div>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Code de transaction</label>
						<input type="text" name="transaction_code" class="form-control {{ $errors->has('transaction_code') ? ' is-invalid' : '' }}" placeholder="Code de transaction" value="{{ old('transaction_code') }}" required />
						@if ($errors->has('transaction_code'))
							<div class="invalid-feedback">{{ $errors->first('transaction_code') }}</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
			<a href="javascript:void(0)" class="btn btn-warning ml-auto">Annuler</a>
			<button type="submit" class="btn btn-primary ml-auto">Envoyer</button>
		</div>
	</form>
</div>
@endsection