<?php

namespace Home\Model;

use Think\Model;

class TypeModel extends Model {
	public function getAllType() {
		return $this->order ( 'ty_nu' )->select ();
	}
	public function getType($ty_nu) {
		$condition ['ty_nu'] = $ty_nu;
		return $this->where ( $condition )->select ();
	}
	public function getBooksList($ty_nu, $order, $page = 1) {
		$condition ['type.ty_nu'] = $ty_nu;
		return $this->where ( $condition )->order ( $order )->join ( 'subtype ON type.ty_nu = subtype.ty_nu' )->join ( 'book ON subtype.su_nu = book.su_nu' )->page ( $page, 10 )->select ();
	}
}