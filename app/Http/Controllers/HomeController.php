<?php

namespace ExpenseTracker\Http\Controllers;

use ExpenseTracker\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Load home page
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
        return view('index');

    }

}
