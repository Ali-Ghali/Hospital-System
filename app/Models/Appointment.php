<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = ['name','email','phone','doctor','date','message','status','user_id'];
    use HasFactory;
    use Notifiable;
}
