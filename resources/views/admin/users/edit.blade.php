@extends('layouts.master')

@section('title', 'Editer l\'utilisateur : ' . $user->full_name)

@section('page-title')
	<h1 class="page-title"><i class="fe fe-edit"></i> Editer l'utilisateur : {{ $user->full_name }}</h1>
	<a href="{{ route('users.index') }}" class="btn btn-outline-success ml-auto"><i class="fe fe-bell"></i> liste des utilisateurs</a>
@endsection

@section('content')
<div class="card">
	<div class="card-status bg-blue"></div>
	<div class="card-header">
		<h3 class="card-title">Editer l'utilisateur : {{ $user->full_name }}</h3>
	</div>
	<form method="post" action="{{ route('users.update', ['id' => $user->id]) }}">
		@csrf
        @method('PUT')
		<div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="prénom" value="{{ old('first_name', $user->first_name) }}">
                        @if ($errors->has('first_name'))
                          <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="nom" value="{{ old('last_name', $user->last_name) }}">
                        @if ($errors->has('last_name'))
                          <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email" value="{{ old('email', $user->email) }}">
                @if ($errors->has('email'))
                  <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="row">
            	<div class="col-md-6">
		            <div class="form-group">
		                <label class="form-label">Mot de passe</label>
		                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" value="{{ old('password') }}">
		                @if ($errors->has('password'))
		                  <div class="invalid-feedback">{{ $errors->first('password') }}</div>
		                @endif
		            </div>
            	</div>
            	<div class="col-md-6">
		            <div class="form-group">
		                <label class="form-label">Confirmation de mot de passe</label>
		                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirmation de mot de passe" value="{{ old('password_confirmation') }}">
		                @if ($errors->has('password_confirmation'))
		                  <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
		                @endif
		            </div>
            	</div>
            </div>
        </div>
		<div class="card-footer text-right">
			<a href="javascript:void(0)" class="btn btn-warning ml-auto">Annuler</a>
			<button type="submit" class="btn btn-primary ml-auto">Enregistrer</button>
		</div>
	</form>
</div>
@endsection