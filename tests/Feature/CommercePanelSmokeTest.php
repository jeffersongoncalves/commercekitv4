<?php

use App\Models\Admin;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use JeffersonGoncalves\Commerce\Currency\Models\Currency;
use JeffersonGoncalves\Commerce\Customer\Models\Customer;
use JeffersonGoncalves\Commerce\Product\Models\Product;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
    $this->admin = Admin::where('email', 'admin@commercekit.test')->firstOrFail();
    $this->user = User::where('email', 'user@commercekit.test')->firstOrFail();
});

it('seeds both guards and a coherent commerce demo dataset', function () {
    expect(Admin::count())->toBe(1)
        ->and(User::count())->toBe(1)
        ->and(Currency::count())->toBe(1)
        ->and(Product::count())->toBe(2)
        ->and(Customer::count())->toBe(1);
});

it('lets an Admin reach the admin panel dashboard', function () {
    $this->actingAs($this->admin, 'admin')
        ->get('/admin')
        ->assertSuccessful();
});

it('lets a User reach the app panel dashboard', function () {
    $this->actingAs($this->user, 'web')
        ->get('/app')
        ->assertSuccessful();
});

it('renders the core commerce Filament list pages for an authenticated admin', function (string $route) {
    $this->actingAs($this->admin, 'admin')
        ->get(route($route))
        ->assertOk();
})->with([
    'products' => 'filament.admin.resources.product.products.index',
    'customers' => 'filament.admin.resources.customer.customers.index',
    'orders' => 'filament.admin.resources.order.orders.index',
    'currencies' => 'filament.admin.resources.currencies.index',
]);
