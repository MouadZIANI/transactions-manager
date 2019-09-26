<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Client;
use App\Models\User;

class PageController extends Controller
{
    public function dashbaord()
    {
    	$transactions = Transaction::latest()->take(10)->get();
    	$transactions_count = Transaction::count();
    	$clients = Client::get();
    	$clients_count = Client::count();
    	$users = User::where('role', 'admin')->get();
    	$users_count = User::where('role', 'admin')->count();

    	return view('admin.pages.dashaboard', [
    		'transactions' => $transactions,
    		'transactions_count' => $transactions_count,
    		'clients' => $clients,
    		'clients_count' => $clients_count,
    		'users' => $users,
    		'users_count' => $users_count,
    	]);
    }

    public function transactions()
    {
    	$transactions = Transaction::paginate(10);

    	return view('admin.pages.transactions', [
    		'transactions' => $transactions
    	]);
    }
}
