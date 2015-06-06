<?php

namespace Home\Model;

use Think\Model;

class BookModel extends Model {
	public function addBook($ty_nu, $bo_na, $bo_pu, $bo_au, $bo_or, $bo_su, $bo_pa) {
		$data ['ty_nu'] = $ty_nu;
		$data ['bo_na'] = $bo_na;
		$data ['bo_pu'] = $bo_pu;
		$data ['bo_au'] = $bo_au;
		$data ['bo_or'] = $bo_or;
		$data ['bo_su'] = $bo_su;
		$data ['bo_pa'] = $bo_pa;
		return $this->add ( $data );
	}
	public function deleteBook($bo_nu) {
		return $this->delete ( $bo_nu );
	}
	public function updateBook($bo_nu, $data) {
		$condition ['bo_nu'] = $bo_nu;
		return $this->where ( $condition )->save ( $data );
	}
	public function getBook($bo_nu) {
		$condition ['bo_nu'] = $bo_nu;
		return $this->where ( $condition )->limit ( 1 )->select ();
	}
	public function getBookList($ty_nu, $page = 1) {
		$condition ['ty_nu'] = $ty_nu;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
	public function getAllBooks($page = 1) {
		return $this->page ( $page, 10 )->select ();
	}
}