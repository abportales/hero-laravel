<?php

namespace App\Http\Controllers;

use App\Enemy;
use App\Hero;
use App\Item;

class AdminController extends Controller
{
    public function index()
    {

        $heroCounter = Hero::count();
        $itemCounter = Item::count();
        $enemyCounter = Enemy::count();

        //array asociativo
        $report = [
            [
                'name' => "Heroe",
                'counter' => $heroCounter,
                'route' => 'heroes.index',
                'class' => 'btn-primary',
            ],
            [
                'name' => "Items",
                'counter' => $heroCounter,
                'route' => 'item.index',
                'class' => 'btn-warning',
            ],
            [
                'name' => "Enemies",
                'counter' => $enemyCounter,
                'route' => 'enemy.index',
                'class' => 'btn-danger',
            ],
        ];

        return view('admin.index', ['report' => $report]);
    }
}
