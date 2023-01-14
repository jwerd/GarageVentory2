<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Index',[
            'stats' => $this->stats()
        ]);
    }

    protected function stats()
    {
        return [
            'mtd' => [
                'amount' => '1.05k',
                'change' => '12% Increase',
            ],
            'ytd' => [
                'amount' => '1.05k',
                'change' => '12% Increase',
            ],
        ];
    }
}
