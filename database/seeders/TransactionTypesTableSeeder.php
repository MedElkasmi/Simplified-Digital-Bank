<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = ['Deposit', 'Withdrawal', 'Transfer', 'Payment', 'Interest', 'Fee'];

        foreach ($types as $type) {
            DB::table('transaction_types')->insert([
                'type_name' => $type
            ]);
        }
    }
}
