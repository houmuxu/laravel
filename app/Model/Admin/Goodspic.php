<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goodspic extends Model
{
    
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goodspic';
	protected $primaryKey = 'gpid';
    public $timestamps = false;

	/**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['gid','gpic'];
}
