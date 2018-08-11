<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Eva extends Model
{
    protected $table = 'eval';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = ['uid','gid','msg','rank','uptime'];
}
