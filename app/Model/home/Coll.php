<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Coll extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'coll';
	protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uid','gid','status'];
}
