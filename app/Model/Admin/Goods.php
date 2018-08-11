<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goods';
    protected $primaryKey = 'gid';
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['cid','gname','desc','price','state','stock','num','goodsattr','uptime','eval'];

    public function goodspics()
    {
        return $this->hasMany('App\Model\Admin\Goodspic','gid');
    }

    public function cates()
    {
        return $this->belongsTo('App\Model\Admin\Cate','cid');
    }

    public function evals()
    {
        return $this->hasMany('App\Model\Admin\Eva','gid');
    }
}
