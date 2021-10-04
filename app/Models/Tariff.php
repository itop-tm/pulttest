<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $guarded = [];
    // Формула расчёта итоговой стоимости = Минимальная стоимость + ((Кол-во минут
    // маршрута - кол-во бесплатных минут) * Стоимость минуты) + ((Кол-во километров -
    // Кол-во бесплатных километров) * Стоимость километра).
    public function countFinalCost($minutes, $kms)
    {
        return $this->minimal_cost + (($minutes - $this->number_of_free_minutes)
        * $this->cost_per_minute) + (($kms - $this->number_of_free_kilometers) * $this->cost_per_km);
    }
    
}
