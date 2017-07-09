<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
  protected $fillable = [
    'name',
    'birth',
    'tel',
    'ra',
    'period',
    'year',
    'paid'
  ];

  public $rules = [
    'name'            => 'required',
    'birth'           => 'required',
    'tel'             => 'numeric',
    'ra'              => 'required|numeric',
    'period'          => 'required',
    'year'            => 'required',
    'paid'            => 'required'
  ];
}
