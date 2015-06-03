<?php

namespace Home\Model;

use Think\Model;

class BookModel extends Model {
	public function getBookList($ty_nu, $page = 1) {
		$condition ['ty_nu'] = $ty_nu;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
	public function getAllBooks($page = 1) {
		return $this->page ( $page, 10 )->select ();
	}
}