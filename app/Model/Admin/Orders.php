<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['gid','oname','addr','uid','tel','addtime','sum','msg','status'];


     //与订单详情表关联 hou
    public function detailss()
    {
        return $this->hasMany('App\Model\Admin\Details','oid','oid');
    }
}
