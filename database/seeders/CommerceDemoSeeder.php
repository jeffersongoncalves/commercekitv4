<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeffersonGoncalves\Commerce\Currency\Models\Currency;
use JeffersonGoncalves\Commerce\Customer\Models\Customer;
use JeffersonGoncalves\Commerce\Product\Enums\ProductStatus;
use JeffersonGoncalves\Commerce\Product\Models\Product;

/**
 * Builds a minimal but coherent commerce demo dataset:
 * a USD currency, a couple of published products and a customer.
 * (Authentication accounts are seeded by DatabaseSeeder.)
 *
 * Idempotent: safe to run repeatedly (keyed on natural unique columns).
 */
class CommerceDemoSeeder extends Seeder
{
    public function run(): void
    {
        // --- Currency -------------------------------------------------------
        Currency::query()->firstOrCreate(
            ['code' => 'usd'],
            [
                'symbol' => '$',
                'symbol_native' => '$',
                'name' => 'US Dollar',
                'decimal_digits' => 2,
                'rounding' => 0,
            ],
        );

        // --- Products -------------------------------------------------------
        $products = [
            ['standard-widget', 'Standard Widget'],
            ['premium-gadget', 'Premium Gadget'],
        ];

        foreach ($products as [$handle, $title]) {
            Product::query()->firstOrCreate(
                ['handle' => $handle],
                ['title' => $title, 'status' => ProductStatus::Published],
            );
        }

        // --- Customer -------------------------------------------------------
        Customer::query()->firstOrCreate(
            ['email' => 'acme@example.test'],
            [
                'first_name' => 'Acme',
                'last_name' => 'Corporation',
                'has_account' => true,
            ],
        );
    }
}
