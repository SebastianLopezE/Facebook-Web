<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function mostrarMarketplace()
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }

        return view('Marketplace');
    }
}
