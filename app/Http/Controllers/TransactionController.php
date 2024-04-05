<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Inertia\Inertia;
use Dompdf\Dompdf;
use Dompdf\Options; // Add this line

class TransactionController extends Controller
{
    //index
    public function index()
    {
        return Inertia::render('Transactions/Index', [
            'transactions' => Transaction::all()->map(function($transaction) {
                return [
                    'id' => $transaction->id,
                    'transaction_id' => $transaction->transaction_id,
                    'customer_name' => $transaction->customer_name,
                    'weight' => $transaction->weight,
                    'order_date' => $transaction->order_date,
                    'description' => $transaction->description,
                    'total' => $transaction->total,
                ];
            })
        ]);
    }

    //create
    public function create()
    {
        return Inertia::render('Transactions/Create');
    }

    //store
    public function store(Request $request)
    {
        Transaction::create([
            'transaction_id' => $request->input('transaction_id'),
            'customer_name' => $request->input('customer_name'),
            'weight' => $request->input('weight'),
            'order_date' => $request->input('order_date'),
            'description' => $request->input('description'),
            'total' => $request->input('total'),
        ]);

        return redirect()->route('transactions.index');
    }

    //edit
    public function edit(Transaction $transaction)
    {
       return Inertia::render('Transactions/Edit',[
            'transaction' => $transaction
       ]);
    }

    //update
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update([
            'transaction_id' => $request->input('transaction_id'),
            'customer_name' => $request->input('customer_name'),
            'weight' => $request->input('weight'),
            'order_date' => $request->input('order_date'),
            'description' => $request->input('description'), // Fix the field name here
            'total' => $request->input('total'),
        ]);

        return redirect()->route('transactions.index');
    }

    //destroy
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }

   
}
