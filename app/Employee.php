<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

  //
  protected $table = 'users';

  //fillable fields
  protected $fillable = ['name', 'username', 'password', 'email', 'tell', 'birthday', 'admin_right' ];

  //custom timestamps name
  const CREATED_AT = 'created';
  const UPDATED_AT = 'modified';

}
