<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $data = [
            'user' => $request->user(),
            'transactions' => Transaction::all(),
        ];

        return view("admin.transaction.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'from_account' => 'required',
            'to_account' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the 'from' and 'to' accounts from the database
        $fromAccount = Account::where('account_number', $validated['from_account'])->first();
        $toAccount = Account::where('account_number', $validated['to_account'])->first();

        // Check if accounts are valid
        if (!$fromAccount || !$toAccount) {
            return redirect()->back()->with('error', 'Account not found.');
        }

        // Check if the 'from' account has sufficient balance for the transaction
        if ($fromAccount->balance < $validated['amount']) {
            return redirect()->back()->with('error', 'Insufficient balance for this transaction.');
        }

        // Create a new database transaction
        DB::transaction(function () use ($fromAccount, $toAccount, $validated) {

            // Deduct the amount from the 'from' account and add it to the 'to' account
            $fromAccount->decrement('balance', $validated['amount']);
            $toAccount->increment('balance', $validated['amount']);

            // Create a new transaction record
            $transaction = Transaction::create([
                'from_account_id' => $fromAccount->id,
                'to_account_id' => $toAccount->id,
                'amount' => $validated['amount'],
                'transaction_type_id' => 1, 
                'transaction_number' => Str::uuid(),
            ]);
        });

        // Redirect back with success message
        return redirect()->back()->with('success', 'Transaction successful.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
