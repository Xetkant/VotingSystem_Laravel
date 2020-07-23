<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    protected $fillable = ['name','photo','bio'];
}
