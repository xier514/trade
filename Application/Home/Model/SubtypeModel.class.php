<?php

namespace Home\Model;

use Think\Model;

class SubtypeModel extends Model {
	public function getAllSubtype() {
		return $this->select ();
	}
	public function getSubtype($ty_nu) {
		$condition ['ty_nu'] = $ty_nu;
		return $this->where ( $condition )->select ();
	}
	public function getType($su_nu) {
		$condition ['su_nu'] = $su_nu;
		return $this->where ( $condition )->select ();
	}
}