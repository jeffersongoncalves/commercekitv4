<div align="center">

![CommerceKit v4](https://raw.githubusercontent.com/jeffersongoncalves/commercekitv4/main/art/jeffersongoncalves-commercekitv4.png)

</div>

# CommerceKit v4

A headless-commerce back office, ready to run — a Laravel 13 + Filament v4 starter application with a
multi-panel, multi-guard architecture and the entire `jeffersongoncalves/filament-commerce` ecosystem
wired into its admin panel.

CommerceKit v4 follows the FilaKit multi-panel pattern: three Filament panels backed by two
authentication guards. The umbrella `jeffersongoncalves/filament-commerce` plugin registers all
commerce modules on the **admin** panel, and a demo seeder lays down a coherent starting dataset so
you can log in and explore a working store back office in minutes.

## Architecture

### Panels

| Panel | Path | Guard | Provider | Purpose |
|-------|------|-------|----------|---------|
| **Admin** | `/admin` | `admin` | `admins` | Management back office — the full commerce suite plus Admin/User management |
| **App**   | `/app`  | `web`   | `users`  | End-user self-service — dashboard and profile |
| **Guest** | `/`     | _(public)_ | — | Public landing pages |

### Guards

Two session guards are configured in `config/auth.php`:

- `admin` → `admins` provider → `App\Models\Admin` (table `admins`)
- `web` → `users` provider → `App\Models\User` (table `users`)

Each guard has its own password-reset broker.

## Features

- **Three panels, two guards** — Admin (`/admin`), App (`/app`) and Guest (`/`) following the FilaKit pattern
- **Full commerce on the admin panel** — `CommercePanelPlugin` registers the entire commerce suite under the `admin` guard
- **21 commerce modules** — currency, store, sales-channel, region, stock-location, api-key, user, auth, product, pricing, inventory, customer, cart, order, payment, fulfillment, tax, promotion, loyalty, store-credit and translation
- **First-party Filament plugins** — Logo, Edit Profile, PWA, Log Viewer, Developer Logins, Impersonate, Additional Information, Sensible Defaults
- **Demo seeder** — seeds an Admin and a User login plus a USD currency, a couple of published products and a customer (idempotent)

## Requirements

- PHP 8.3+
- Laravel 13
- SQLite (default) or MySQL

## Installation

```bash
git clone https://github.com/jeffersongoncalves/commercekitv4.git
cd commercekitv4
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
```

The commerce module migrations are **publish-only** — publish each module's migrations into
`database/migrations`, then migrate. A convenience composer script publishes them all at once:

```bash
composer publish-commerce
# ...or publish an individual module, e.g.:
# php artisan vendor:publish --tag="commerce-product-migrations"

php artisan migrate
php artisan db:seed
php artisan serve
```

## Demo logins

| Panel | URL | Email | Password |
|-------|-----|-------|----------|
| Admin | [http://localhost:8000/admin](http://localhost:8000/admin) | `admin@commercekit.test` | `password` |
| App   | [http://localhost:8000/app](http://localhost:8000/app)     | `user@commercekit.test`  | `password` |

The Guest panel is served at [http://localhost:8000/](http://localhost:8000/).

## What's included on the admin panel

The umbrella plugin registers the commerce suite across these modules:

| Module | Covers |
|--------|--------|
| **Product** | Products, variants, options, categories, collections, tags, types, images |
| **Pricing** | Price lists, price sets and rules |
| **Inventory** | Inventory items, levels and reservations |
| **Customer** | Customers, groups and addresses |
| **Cart** | Carts, line items, shipping methods |
| **Order** | Orders, fulfillments, returns, exchanges, claims and edits |
| **Payment** | Payment collections, sessions, captures and refunds |
| **Fulfillment** | Shipping options, fulfillment sets, service zones |
| **Tax** | Tax regions, rates and providers |
| **Promotion** | Campaigns, rules and application methods |
| **Region** | Regions and countries |
| **Sales Channel** | Sales channels |
| **Stock Location** | Stock locations |
| **Store / Currency** | Store settings and currencies |
| **Loyalty / Store Credit** | Loyalty and store-credit balances |
| **Translation** | Content translations |
| **Users / API Keys / Auth** | Commerce users, publishable/secret API keys and auth identities |

Each module can be toggled via the plugin's `exceptModules()` / `modules()` methods — see the
[`jeffersongoncalves/filament-commerce`](https://github.com/jeffersongoncalves/filament-commerce)
documentation.

## Credits

- [Jefferson Simão Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
