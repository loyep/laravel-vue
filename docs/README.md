# Prism

[![Build Status](https://travis-ci.com/loyep/prism.svg?token=YhCvPgf5uspm18kxdLkJ&branch=master)](https://travis-ci.com/loyep/prism)
[![License](https://poser.pugx.org/loyep/prism/license)](LICENSE)

> A Laravel-Vue Website.

## Features

- Laravel 5.8 
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register and password reset
- Socialite integration

## Installation

- `composer create-project --prefer-dist loyep/prism`
- Edit `.env` and set your database connection details
- (When installed via git clone or download, run `php artisan key:generate` and `php artisan prism:install`)
- `php artisan migrate --seed`
- `npm install`

## Usage

#### Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## License

Prism is released under an MIT license. See [License](https://github.com/loyep/prism/blob/master/LICENSE) for more information.
