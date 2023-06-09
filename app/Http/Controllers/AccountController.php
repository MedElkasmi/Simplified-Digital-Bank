<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Interest;
use App\Models\AccountType;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;
use App\Models\UserTaxInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = [
            'user' => $request->user(),
            'accounts' => Account::all(),
        ];

        return view("admin.account.index",$data);
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
        $validated = $request->validate([
            'account_type' => 'required',
            'currency_type' => 'required',
            'initial_deposit' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'tax_id' => 'required',
        ]);

        $user = Auth::user(); 

        $accountType = AccountType::where('type_name', $validated['account_type'])->first();

        if($user->accounts()->where('account_type_id',$accountType->id)->exists()) {

            return redirect()->back()->withErrors(['account_type' => 'You already have an account of this type.']);
        }

        DB::beginTransaction();

        try {
            
            $account = Account::create([
                'user_id' => $user->id,
                'account_name' => $user->name,
                'account_type_id' => $accountType->id,
                'account_number' => Account::generateUniqueAccountNumber(),
                'currency_type' => $request->currency_type,
                'initial_deposit' => $request->initial_deposit,
                'balance' => $request->initial_deposit,
                'withdrawal_limit' => 0,
            ]);

            $interest = Interest::create([
                'account_id' => $account->id,
                'interest_rate' => 1.5,
                'interest_period' => 'Daily',
                'calculation_date' => Carbon::now(),
                'interest_amount' => 0,
                
            ]);

            $securityQuestion = SecurityQuestion::create([
                'question' => $request->question,
            ]);

            $userSecurityAnswer = UserSecurityAnswer::create([
                'user_id' => $user->id, 
                'security_question_id' => $securityQuestion->id, 
                'answer' => Hash::make($request->answer),
            ]);

            $userTaxInformation = UserTaxInformation::create([
                'user_id' => $user->id,
                'tax_id' => $request->tax_id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Account created successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
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
