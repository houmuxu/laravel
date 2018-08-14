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
    protected $fillable = ['price','cnt','status'];

    //商品关联
    public function det_goods() 
    {
        return $this->hasOne('App\Model\Admin\Goods','gid','gid');
    }

    //商品图片关联
    public function det_goodspic() 
    {
        return $this->hasMany('App\Model\Admin\Goodspic','gid','gid');
    }

    //促销商品关联
    public function det_sales() 
    {
        return $this->hasOne('App\Model\Admin\Sales','sid','gid');
    }

    //促销商品图片关联
    public function det_salespic() 
    {
        return $this->hasMany('App\Model\Admin\Salespic','sid','gid');
    }


}
