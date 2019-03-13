# Grace

[![Build Status](https://travis-ci.org/loyep/grace.svg?branch=master)](https://travis-ci.org/loyep/grace)
[![Latest Stable Version](https://poser.pugx.org/loyep/grace/v/stable)](https://packagist.org/packages/loyep/grace)
[![Total Downloads](https://poser.pugx.org/loyep/grace/downloads)](https://packagist.org/packages/loyep/grace)
[![Latest Unstable Version](https://poser.pugx.org/loyep/grace/v/unstable)](https://packagist.org/packages/loyep/grace)
[![License](https://poser.pugx.org/loyep/grace/license)](https://packagist.org/packages/loyep/grace)

> A Laravel-Vue Website.

![](screenshots/home.png)

## Features

- Laravel 5.8 
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register and password reset
- Socialite integration

## Installation

- `composer create-project --prefer-dist loyep/grace blog`
- Edit `.env` and set your database connection details
- (When installed via git clone or download, run `php artisan key:generate` and `php artisan grace:install`)
- `php artisan migrate --seed`
- `npm install`

## Usage

#### Development

```bash
# watch
// 前端
npm run watch
// 后台
npm run watch:grace

# dev
// 前端
npm run dev
// 后台
npm run dev:grace

```

#### Production

```bash
// 前端
npm run prod

// 后台
npm run prod:grace

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## License

Grace is released under an MIT license. See [License](LICENSE) for more information.
