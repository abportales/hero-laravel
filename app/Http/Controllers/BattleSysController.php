<?php

namespace App\Http\Controllers;

use App\Enemy;
use App\Hero;

class BattleSysController extends Controller
{
    public function index()
    {
        // dd($this->runManualBattle(1,1));

        return view('admin.battlesys.index', $this->runAutoBattle(1, 1));
    }

    public static function runAutoBattle($heroId, $enemyId)
    {
        $hero = Hero::find($heroId)->first();
        $enemy = Enemy::find($enemyId)->first();

        // dd($hero->level());
        // dd($hero->level);
        $events = [];

        while ($hero->hp > 0 && $enemy->hp > 0) {
            $luck = random_int(0, 100);

            if ($luck >= $hero->luck) {     //ataca hero
                $hp = $enemy->def - $hero->atq; // 5-1 = 4
                if ($hp < 0) {
                    $enemy->hp -= $hp * -1;
                }

                if ($enemy->hp > 0) {
                    $ev = [
                        'winner' => 'hero',
                        "text" => $hero->name . " hizo un daño de " . $hero->atq . " a " . $enemy->name,
                    ];
                } else {
                    $ev = [
                        'winner' => 'hero',
                        "text" => $hero->name . " derroto a: " . $enemy->name . " y gano " . $enemy->xp . " de experiencia.",
                    ];

                    $hero->xp += $enemy->xp;
                    if ($hero->xp >= $hero->level->xp) {
                        $hero->xp = 0;
                        $hero->level_id += 1;
                    }
                    $hero->save();
                }

                // print("Enemy HP: " . $enemy->hp . "<br>");
            } else {
                $hp = $hero->def - $enemy->atq;
                if ($hp < 0) {
                    $hero->hp -= $hp * -1;
                }

                if ($hero->hp > 0) {
                    $ev = [
                        'winner' => 'enemy',
                        "text" => $enemy->name . " hizo un daño de " . $enemy->atq . " a " . $hero->name,
                    ];
                } else {
                    $ev = [
                        'winner' => 'enemy',
                        "text" => $enemy->name . " derroto a: " . $hero->name,
                    ];
                }

                //print("hero HP: " . $hero->hp . "<br>");
            }
            array_push($events, $ev);
        }

        return [
            'events' => $events,
            'hero' => $hero->name,
            'enemy' => $enemy->name,
            'heroAvatar' => $hero->img_path,
            'enemyAvatar' => $enemy->img_path,
        ];
    }

    public function runManualBattle($heroId, $enemyId)
    {

        $hero = Hero::find($heroId)->first();
        $enemy = Enemy::find($enemyId)->first();

        $luck = random_int(0, 100);

        if ($luck >= $hero->luck) {
            $hp = $enemy->def - $hero->atq; // 5-1 = 4
            if ($hp < 0) {
                $enemy->hp -= $hp * -1;
            }

            if ($enemy->hp > 0) {
                return [
                    'winner' => 'hero',
                    "text" => $hero->name . " hizo un daño de " . $hero->atq . " a " . $enemy->name,
                ];
            } else {
                return [
                    'winner' => 'hero',
                    "text" => $hero->name . " derroto a: " . $enemy->name . " y gano " . $enemy->xp . " de experiencia.",
                ];

                $hero->xp += $enemy->xp;
                if ($hero->xp >= $hero->level->xp) {
                    $hero->xp = 0;
                    $hero->level_id += 1;
                }
                $hero->save();
            }

        } else {
            $hp = $hero->def - $enemy->atq;
            if ($hp < 0) {
                $hero->hp -= $hp * -1;
            }

            if ($hero->hp > 0) {
                return [
                    'winner' => 'enemy',
                    "text" => $enemy->name . " hizo un daño de " . $enemy->atq . " a " . $hero->name,
                ];
            } else {
                return [
                    'winner' => 'enemy',
                    "text" => $enemy->name . " derroto a: " . $hero->name,
                ];
            }
        }
    }
}
