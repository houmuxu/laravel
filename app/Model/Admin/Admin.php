<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'admin';

    protected $primaryKey = 'aid';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['aname','apwd','atel','aemail','auth','astatus'];

     //hou
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role', 'role_user', 'user_id', 'role_id');
    }


}
