<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PageController extends Controller
{
    public function dashbaord()
    {	
    	$transactions = Auth::user()->client->transactions()->latest()->take(10)->get();
    	$transactions_count = Auth::user()->client->transactions()->count();
    	$clients = [];
    	foreach (Auth::user()->client->transactions as $key => $transaction) {
    		$clients[$transaction->to_email] = [
    			'name' => $transaction->to_name,
    			'email' => $transaction->to_email
    		];
    	}
    	$clients_count = count($clients);

    	return view('client.pages.dashbaord', [
    		'transactions' => $transactions,
    		'transactions_count' => $transactions_count,
    		'clients' => $clients,
    		'clients_count' => $clients_count
    	]);
    }
}
