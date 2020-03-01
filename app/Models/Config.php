<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table='configs';
    protected $primaryKey='conf_id';
    public $timestamps=false;
    protected $guarded=[];
}
