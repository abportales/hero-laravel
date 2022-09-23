<?php

namespace App\Http\Controllers;

use App\Enemy;
use App\Hero;
use App\Item;

class APIController extends Controller
{
    public function index()
    {
        //estructura de JSON(status, message, data y algunas veces code[404,500,200])
        $res = [
            "status" => "ok",
            "message" => "LA API funciona correctamente",
        ];
        // se envia la respuesta y el codigo php
        return response()->json($res, 200);
    }

    public function getAllHeroes()
    {
        $heroes = Hero::all();

        $res = [
            "status" => "ok",
            "message" => "Lista de heroes",
            "data" => $heroes,
        ];
        // se envia la respuesta y el codigo php
        return response()->json($res, 200);
    }

    public function getHero($id)
    {
        $hero = Hero::find($id);

        if (isset($hero)) {
            $res = [
                "status" => "ok",
                "message" => "Heroe: " . $hero->name,
                "data" => $hero,
            ];
        } else {
            $res = [
                "status" => "error",
                "message" => "el heroe no existe",
            ];
        }
        // se envia la respuesta y el codigo php, aunq no se envie data, la api responde correctamente por eso se envia 200.
        return response()->json($res, 200);
    }

    public function getAllEnemies()
    {
        $enemies = Enemy::all();

        $res = [
            "status" => "ok",
            "message" => "Lista de enemigos",
            "data" => $enemies,
        ];
        // se envia la respuesta y el codigo php
        return response()->json($res, 200);
    }

    public function getEnemy($id)
    {
        $enemy = Enemy::find($id);

        if (isset($enemy)) {
            $res = [
                "status" => "ok",
                "message" => "Enemigo: " . $enemy->name,
                "data" => $enemy,
            ];
        } else {
            $res = [
                "status" => "error",
                "message" => "el enemigo no existe",
            ];
        }
        // se envia la respuesta y el codigo php, aunq no se envie data, la api responde correctamente por eso se envia 200.
        return response()->json($res, 200);
    }

    public function getAllItems()
    {
        $items = Item::all();

        $res = [
            "status" => "ok",
            "message" => "Lista de items",
            "data" => $items,
        ];
        // se envia la respuesta y el codigo php
        return response()->json($res, 200);
    }

    public function getItem($id)
    {
        $item = Item::find($id);

        if (isset($item)) {
            $res = [
                "status" => "ok",
                "message" => "Item: " . $item->name,
                "data" => $item,
            ];
        } else {
            $res = [
                "status" => "error",
                "message" => "El Item no existe",
            ];
        }
        // se envia la respuesta y el codigo php, aunq no se envie data, la api responde correctamente por eso se envia 200.
        return response()->json($res, 200);
    }

    public function runManulBattleSys($heroId, $enemyId)
    {
        $bs = BattleSysController::runAutoBattle($heroId, $enemyId);

        $res = [
            "status" => "ok",
            "message" => "Sistema de batalla: " . $bs["hero"] . " Vs " . $bs["enemy"],
            "data" => $bs,
        ];
        // se envia la respuesta y el codigo php
        return response()->json($res, 200);
    }
}
