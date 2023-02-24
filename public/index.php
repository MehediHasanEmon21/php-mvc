<?php

declare(strict_types = 1);

use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../views/');

$router = new Router();

$router->get('/', [HomeController::class, 'index'])
       ->get('/invoice', [InvoiceController::class, 'index'])
       ->get('/invoice/create', [InvoiceController::class, 'create'])
       ->post('/invoice/store', [InvoiceController::class, 'store']);

$router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));






