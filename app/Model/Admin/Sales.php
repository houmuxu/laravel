<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'sid';
    public $timestamps = false;

     /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['gname','oldprice','newprice','stock','desc','uptime','goodsattr'];

    public function salespic()
    {
    	return $this->hasMany('App\Model\Admin\Salespic','sid');
    }
}
