<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // ← 1. Ajouter cet import

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable; // ← 2. Ajouter HasRoles ici

    // ... le reste du fichier reste inchangé
}
