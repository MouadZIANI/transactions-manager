<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Operator;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.transactions.index', [
            'transactions' => Auth::user()->client->transactions()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.transactions.create', [
            'operators' => Operator::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'client_id' => Auth::user()->client->id, 
            'to_name' => $request->to_name, 
            'to_email' => $request->to_email,
            'to_phone_number' => $request->to_phone_number, 
            'to_address' => $request->to_address,
            'transaction_code' => $request->transaction_code, 
            'operator_id' => $request->operator_id, 
            'total' => $request->total,
            'sent_at' => $request->sent_at
        ]);

        $data = [
            'from' => auth()->user()->email,
            'transaction_code' => $transaction->transaction_code,
            'operator' => $transaction->operator->name,
            'total' => $transaction->total,
            'client' => $transaction->client->user->full_name,
        ];
        $user = new User();
        $user->email = $transaction->to_email;
        $user->notify(new \App\Notifications\TransactionNotification($data));

        Session::flash('success', 'Transaction a été enregistré avec succès !');

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        Session::flash('success', 'Transaction a été supprimé avec succès !');

        return redirect()->route('transactions.index');
    }
}
