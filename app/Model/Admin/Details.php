<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'details';

    protected $primaryKey = 'did';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['price','cnt'];

    public function det_goods() 
    {
        return $this->hasOne('App\Model\Admin\Goods','gid','gid');
    }

    public function det_goodspic() 
    {
        return $this->hasMany('App\Model\Admin\Goodspic','gid','gid');
    }



}
