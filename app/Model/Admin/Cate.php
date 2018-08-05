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

        public static function getTreeCates($pid=0)
    {

        $cate = Cate::where('pid',$pid)->get();
        
        $arr = [];

        foreach($cate as $k=>$v){

            if($v->pid==$pid){

                $v->sub=self::getTreeCates($v->cid);

                $arr[]=$v;
            }
        }  
        return $arr;
    }

    public function goodss()
    {
        return $this->hasMany('App\Model\Admin\Goods','cid');
    }

}
