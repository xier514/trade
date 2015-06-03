<?php

namespace Home\Model;

use Think\Model;

class TypeModel extends Model {
	public function getType($ty_na) {
		$condition ['ty_na'] = $ty_na;
		return $this->where ( $condition )->select ();
	}
}