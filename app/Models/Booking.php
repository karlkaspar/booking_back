<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'animal_type',
    'breed',
    'is_mixed',
    'animal_age',
    'phone_number',
    'customer_surname',
    'email',
    'is_shared',
    'created_at',
  ];


  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'updated_at'
  ];
}
