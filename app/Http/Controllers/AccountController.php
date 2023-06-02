<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;
use App\Models\UserTaxInformation;
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
        $request->validate([
            'account_name' => 'required',
            'account_type' => 'required',
            'currency_type' => 'required',
            'initial_deposit' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'tax_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user(); 

            $account = Account::create([
                'user_id' => $user->id,
                'account_name' => $request->account_name,
                'account_number' => Account::generateUniqueAccountNumber(),
                'account_type' => $request->account_type,
                'currency_type' => $request->currency_type,
                'initial_deposit' => $request->initial_deposit,
            ]);

            $securityQuestion = SecurityQuestion::create([
                'question' => $request->question,
            ]);

            $userSecurityAnswer = UserSecurityAnswer::create([
                'user_id' => $user->id, 
                'security_question_id' => $securityQuestion->id, 
                'answer' => $request->answer,
            ]);

            $userTaxInformation = UserTaxInformation::create([
                'user_id' => $user->id,
                'tax_id' => $request->tax_id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Account created successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred, please try again');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
