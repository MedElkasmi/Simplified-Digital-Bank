<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;

class UpdateExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-exchange-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the exchange rates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $response = Http::get('http://api.exchangeratesapi.io/v1/latest?access_key=054a0a2459738012b0452aad2b197eaf');

        if ($response->successful()) {
            $rates = $response->json()['rates'];

            foreach ($rates as $currency => $rate) {
                // assuming you have a currency model and table
                Currency::updateOrCreate(
                    ['code' => $currency],
                    ['rate' => $rate]
                );
            }

            $this->info('Exchange rates updated successfully.');
        } else {
            $this->error('Failed to update exchange rates.');
        }
    }
}
