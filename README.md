# PHP MVC Framework

A lightweight, self-built PHP MVC framework for learning and prototyping.  

Includes custom routing, dependency injection container, validation, session handling, and [Pest](https://pestphp.com) for testing.

---

## Features

- PSR-4 Autoloading via Composer
- Custom Router and Controller structure
- Dependency Injection Container
- Form Request Validation
- Flash Session Helper
- Simple View Rendering
- Pest Testing Setup

---

## Project Structure

```

php-mvc-framework/
├── Core/                # Framework logic (App, Router, Container, etc.)
├── Http/                # Controllers, form objects, etc.
├── public/              # Entry point (index.php)
├── views/               # Blade-style PHP templates
├── tests/               # Feature / Unit tests (Pest)
├── routes.php           # Web route definitions
├── bootstrap.php        # App startup logic
├── config.php           # DB config (array)
├── composer.json        # Autoload & dependencies
└── vendor/              # Composer packages (not tracked in Git)

````

---

## Installation

1. Clone the repository

```bash
git clone https://github.com/kwfg/php-mvc-framework.git
cd php-mvc-framework
````

2. Install dependencies

```bash
composer install
composer dump-autoload -o
```

3. Run the development server

```bash
php -S localhost:8888 -t public
```

---

## Testing

This project uses [PestPHP](https://pestphp.com) for testing.

To run tests:

```bash
./vendor/bin/pest
```

To initialize Pest (if not already done):

```bash
./vendor/bin/pest --init
```


