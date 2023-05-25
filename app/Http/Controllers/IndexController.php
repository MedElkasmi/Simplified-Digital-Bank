<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(Request $request){

        try {

            $user = $request->user();

            return view('admin.index',['user'=> $user]);
        }

        catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while loading the data. Please try again later.');
        }

    }
}
