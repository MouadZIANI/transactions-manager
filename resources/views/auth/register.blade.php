@extends('layouts.master-default')
@section('content')
<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col col-md-6 mx-auto">
                <div class="text-center mb-6">
                    <img src="./demo/brand/tabler.svg" class="h-6" alt="">
                </div>
                <form class="card" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="card-body p-6">
                        <div class="card-title">Creer nouveau compte</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="Enter votre prénom" value="{{ old('first_name') }}">
                                    @if ($errors->has('first_name'))
                                      <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Enter votre nom" value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                      <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter votre email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                      <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">N°. Telephone</label>
                                    <input type="tel" name="phone_number" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="Enter votre N°. Telephone" value="{{ old('phone_number') }}">
                                    @if ($errors->has('phone_number'))
                                      <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                              <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmation de mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirmation de mot de passe" value="{{ old('password_confirmation') }}">
                            @if ($errors->has('password_confirmation'))
                              <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">Enregister</button>
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted">
                    Avez vous un compte ? <a href="{{ route('login') }}">Authentification</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection