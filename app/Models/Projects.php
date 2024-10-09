<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'organizationId',
        'project',
        'description',
        'startDate',
        'endDate',
        'countryId',
        'stateId',
        'cityId',
        'active',
    ];
}
