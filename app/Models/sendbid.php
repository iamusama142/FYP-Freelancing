<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class sendbid extends Model
{
    use HasFactory , Notifiable;
    protected $table="sendbids";
    protected $primarykey="";
}
