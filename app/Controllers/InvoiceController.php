<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;

class InvoiceController
{
    public function index()
    {
        return View::make('invoice/index');
    }

    public function create()
    {
        return View::make('invoice/create');
    }

    public function store()
    {
        print_r($_POST);
    }
}