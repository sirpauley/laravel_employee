<?php

namespace SES;

use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{

  public function setUpdatedAtAttribute($value)
  {
      // to Disable updated_at
  }

  protected $table = 'reviews';

  //fillable fields
  protected $fillable = ['employee_id', 'reviewer_id', 'comment'];

  
  //custom timestamps name
  const CREATED_AT = 'created';

}
