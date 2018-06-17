<?php

namespace SES;

use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{

  protected $table = 'reviews';

  //fillable fields
  protected $fillable = ['employee_id', 'reviewer_id', 'comment'];

  //custom timestamps name
  const CREATED_AT = 'created';

}
