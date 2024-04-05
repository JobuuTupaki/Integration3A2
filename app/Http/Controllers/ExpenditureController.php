<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure;
use Inertia\Inertia;

class ExpenditureController extends Controller
{

    //index
    public function index()
    {
        return Inertia::render('Expenditures/Index', [
            'expenditures' => Expenditure::all()->map(function($expenditure) {
                return [
                    'id' => $expenditure->id,
                    'detail' => $expenditure->detail,
                    'total' => $expenditure->total,
                    'expenditure_date' => $expenditure->expenditure_date,
                ];
            
                })

        ]);
    }
        //create
    public function create()
    {
        return Inertia::render('Expenditures/Create');
    }
        //store
    public function store(Request $request)
    {
        Expenditure::create([
            'detail' => $request->input('detail'),
            'total' => $request->input('total'),
            'expenditure_date' => $request->input('expenditure_date'),
        ]);

        return redirect()->route('expenditures.index');
    }
        //edit
    public function edit(Expenditure $expenditure)
    {
       return Inertia::render('Expenditures/Edit',[
            'expenditure' => $expenditure
       ]);
    }
        //update
        public function update(Request $request, Expenditure $expenditure)
        {
            $expenditure->update([
                'detail' => $request ->input('detail'),
                'expenditure_date' => $request->input('expenditure_date'),
                'total' => $request->input('total'),
            ]);
            
            return redirect()->route('expenditures.index');
        }
        
        //destroy
    public function destroy(Expenditure $expenditure)
    {
        $expenditure->delete();
        return redirect()->route('expenditures.index');
    }
}
