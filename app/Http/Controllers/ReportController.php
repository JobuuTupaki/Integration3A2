<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Inertia\Inertia;

class ReportController extends Controller
{
    // Index method to display reports
    public function index()
    {
        // Fetch transactions data
        $transactions = Transaction::all();

        // Pass transactions data to the view
        return Inertia::render('Reports/Index', [
            'transactions' => $transactions
        ]);
    }
}
