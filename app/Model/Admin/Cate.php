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

    static public function getTreeCates($cates=[],$pid=0)
    {
        if(empty($cates)){
            $cates = self::all();
        }
        $tmp = [];
        foreach($cates as $k=>$v){
            if($v->pid==$pid){
            $v->sub = self::getTreeCates($cates,$v->cid);
            $tmp[] = $v;
        }
        }
        return $tmp;    
    }


    public function goodss()
    {
        return $this->hasMany('App\Model\Admin\Goods','cid');
    }

}
