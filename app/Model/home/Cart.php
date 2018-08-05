<?php

namespace App\Model\home;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'cart';
	protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uid','gid','num','goodsattr','gname','price'];
}
