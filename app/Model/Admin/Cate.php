<?php 

namespace App\Model\Admin;


use Illuminate\Database\Eloquent\Model;


class Cate extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'cate';
	protected $primaryKey = 'cid';
    public $timestamps = false;

	/**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['cname','pid','path'];
}
