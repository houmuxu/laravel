<?php

use App\Model\Admin\Cate;

	function getName($pid)
	{
		if($pid == '0'){
			return '顶级分类';
		} else {
			$res = Cate::where('cid',$pid)->first();

			return $res->cname;
		}
	}
	
?>