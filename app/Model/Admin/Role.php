<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'role';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

	public function permissions()
	{
		return $this->belongsToMany('App\Model\Admin\Permission', 'role_per', 'role_id', 'per_id');
	}
}
