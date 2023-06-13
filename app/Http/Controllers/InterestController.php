<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterestController extends Controller
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
        $user = $request->user();
        $accounts = Account::all();

        DB::transaction(function () use ($accounts) {
            foreach($accounts as $account){
                if ($account->interest) { // ensure interest exists for this account
                    $interest = $account->interest->calculateSimpleInterest();
                    $account->increment('balance', $interest);
                }
            }
        });

        return view("admin.interest.create",['user'=> $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interest $interest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interest $interest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interest $interest)
    {
        //
    }
}
