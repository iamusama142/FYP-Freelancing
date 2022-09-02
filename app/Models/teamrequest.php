<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class teamrequest extends Model
{
    use HasFactory ;

protected $fillable = [
'sender_id',
'reciever_id',
'project_name',
'project_desscription',
'deadline',
];

    protected $table="teamrequests";
    protected $primarykey="";
}
