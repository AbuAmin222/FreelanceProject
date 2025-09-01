<?php

namespace App\Models;

use App\Traits\ModelLoginSearchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable

{
    use HasFactory, Notifiable, HasRoles, ModelLoginSearchable;

    protected $guarded = [];

    // 🔑 هذا يربط Spatie Permission مع الـ guard admin
    protected $guard_name = 'admin';
}
