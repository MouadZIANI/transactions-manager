@extends('layouts.master')

@section('title', 'Tableau de board')

@section('page-title') 
    <h1 class="page-title"><i class="fe fe-dashboard"></i> Tableau de board</h1> 
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mes 10 derniers transactions</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Destinataire</th>
                                <th>E-mail</th>
                                <th>Operateur</th>
                                <th>Total (DH)</th>
                                <th>Date d'envoi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->to_name }}</td>
                                    <td>{{ $transaction->to_email }}</td>
                                    <td><span class="status-icon bg-success"></span> {{ $transaction->operator->name }}</td>
                                    <td>{{ $transaction->total }}</td>
                                    <td>{{ dateToFrFormat($transaction->sent_at) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-blue mr-3">
                                <i class="fe fe-dollar-sign"></i>
                            </span>
                            <div>
                                <h4 class="m-0"><a href="javascript:void(0)">{{ $transactions_count }}</a></h4>
                                <small class="text-muted">Transactions</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-red mr-3">
                                <i class="fe fe-users"></i>
                            </span>
                            <div>
                                <h4 class="m-0"><a href="javascript:void(0)">{{ $clients_count }}</a></h4>
                                <small class="text-muted">Clients</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mes clients</h3>
                        </div>
                        <div class="card-body o-auto" style="height: 15rem">
                            <ul class="list-unstyled list-separated">
                                @foreach ($clients as $client)
                                    <li class="list-separated-item">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div>
                                                    <a href="javascript:void(0)" class="text-inherit">{{ $client['name'] }}</a>
                                                </div>
                                                <small class="d-block item-except text-sm text-muted h-1x">{{ $client['email'] }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection