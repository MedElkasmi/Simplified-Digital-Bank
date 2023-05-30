<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\securityQuestion;
use App\Models\userSecurityAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
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
        $user = $request->user();

        return view("admin.account.create",['user'=> $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([


            'account_name' => 'required',
            'account_type' => 'required',
            'currency_type' => 'required',
            'initial_deposit' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'tax_id' => 'required',
        ]);

        // Begin transaction
        DB::beginTransaction();

        try {
            
            $user = Auth::user(); 

            $account = new account;
            $account->user_id = $user->id;
            $account->account_name = $validatedData['account_name'];
            $account->account_type = $validatedData['account_type'];
            $account->currency_type = $validatedData['currency_type'];
            $account->initial_deposit = $validatedData['initial_deposit'];
            $account->save();

            $securityQuestion = new securityQuestion;
            $securityQuestion->question = $validatedData['question'];
            $securityQuestion->save(); 

            $userSecurityAnswer = new userSecurityAnswer;
            $userSecurityAnswer = $validatedData['answer'];
            $userSecurityAnswer->save();

            $userTaxInformation = new userTaxInformation;
            $userTaxInformation = $validatedData['tax_id'];
            $userTaxInformation->save();

            // If everything is fine, commit the transaction
            DB::commit();
        }

        catch(\Exception $e) {

            // An error occured; cancel the transaction...
            DB::rollback();
            // and throw the error again.
            throw $e;
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(account $account)
    {
        //
    }
}
