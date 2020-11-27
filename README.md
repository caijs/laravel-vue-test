
> Cai Laravel-Vue Test (Nov 27th)

## Features

- Laravel 8
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register
- View Teams, Add a New Team
- View players belonged to a specific team, Add a player to a specific team, Update a player
- Authentication with JWT
- Bootstrap 4 + Font Awesome 5

## Installation

- `composer create-project --prefer-dist laravel-vue-test`
- Edit `.env` and set your database connection details
- (When installed via git clone or download, run `php artisan key:generate` and `php artisan jwt:secret`)
- `php artisan migrate`
- `php artisan db:seed --class=TeamSeeder`

- `npm install`

## Usage

#### Development

```bash
# Build and watch
npm run watch

# Serve with hot reloading (not working)
npm run hot
```

#### Production

```bash
npm run production
```

## Socialite

This project starts with GitHub repo: `https://github.com/cretueusebiu/laravel-vue-spa`

## Testing

```bash
# Run unit and feature tests
vendor/bin/phpunit

# Run Dusk browser tests
php artisan dusk
```
