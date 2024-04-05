<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice; 
use Inertia\Inertia;

class InvoiceController extends Controller // Corrected the class name to ReceiptController
{

    //index
    public function index()
    {
        $invoices = Invoice::all(); // Fetch all receipts from the database

        return Inertia::render('Invoices/Index', [
            'invoices' => $invoices // Pass the receipts to the Inertia view
        ]);
    }
}
