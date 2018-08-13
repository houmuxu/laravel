<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'uid';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uname','upwd','usex','utel','uemail','uaddr','utime'];

    //与订单表关联 hou
    public function orders()
    {
        return $this->hasMany('App\Model\Admin\Orders','uid');
    }

    //与收藏关联 hou
    public function colls()
    {
        return $this->hasMany('App\Model\home\Coll','uid');
    }
}
