<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    protected $model = Position::class;
    public function definition()
    {
        return [
            'stanowisko'=>'Dyrektor Produkcji',
            'chemia'=>0,
            'halas'=>0,
            'inne'=>0,
            'poziom_dostepu'=>UserRole::BOSS
        ];
    }
}
