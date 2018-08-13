<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Salespic extends Model
{
    protected $table = 'salespic';
    protected $primaryKey = 'spid';
    public $timestamps = false;

     /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['sid','salespic'];
}
