<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Lunbo extends Model
{
     //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'lunbo';
	protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['url','pic','status','uptime'];
}
