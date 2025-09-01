<?php

namespace App\Models;

use App\Traits\ModelLoginSearchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Freelancer extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, ModelLoginSearchable;

    protected $guarded = [];

    protected $guard_name = 'freelancer';
}
