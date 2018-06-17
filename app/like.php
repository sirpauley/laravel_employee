<?php

namespace SES;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{

  public function setUpdatedAtAttribute($value)
  {
      // to Disable updated_at
  }

  protected $table = 'likes';

  //fillable fields
  protected $fillable = ['employee_id', 'employee_liked_id'];

  //custom timestamps name
  const CREATED_AT = 'created';

}
