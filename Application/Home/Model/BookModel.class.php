<?php

namespace Home\Model;

use Think\Model;

class BookModel extends Model {
	public function addBook($su_nu, $us_nu, $bo_na, $bo_pu, $bo_au, $bo_or, $bo_su, $bo_co, $bo_pr, $bo_le, $bo_de, $bo_re, $bo_pi, $bo_st) {
		$data ['su_nu'] = $su_nu;
		$data ['us_nu'] = $us_nu;
		$data ['bo_na'] = $bo_na;
		$data ['bo_pu'] = $bo_pu;
		$data ['bo_au'] = $bo_au;
		$data ['bo_or'] = $bo_or;
		$data ['bo_su'] = $bo_su;
		$data ['bo_co'] = $bo_co;
		$data ['bo_pr'] = $bo_pr;
		$data ['bo_le'] = $bo_le;
		$data ['bo_de'] = $bo_de;
		$data ['bo_re'] = $bo_re;
		$data ['bo_pi'] = $bo_pi;
		$data ['bo_st'] = $bo_st;
		return $this->add ( $data );
	}
	public function deleteBook($bo_nu) {
		return $this->delete ( $bo_nu );
	}
	public function updateBook($bo_nu, $data) {
		$condition ['bo_nu'] = $bo_nu;
		return $this->where ( $condition )->save ( $data );
	}
	public function setBookState($bo_nu, $bo_st) {
		$condition ['bo_nu'] = $bo_nu;
		return $this->where ( $condition )->setField ( 'bo_st', $bo_st );
	}
	public function getBook($bo_nu) {
		$condition ['bo_nu'] = $bo_nu;
		return $this->where ( $condition )->limit ( 1 )->select ();
	}
	public function getSubBooksList($su_nu, $order, $page = 1) {
		$condition ['su_nu'] = $su_nu;
		return $this->where ( $condition )->order ( $order )->page ( $page, 10 )->select ();
	}
	public function searchBooksList($keyword, $order, $page = 1) {
		$map ['bo_na'] = array (
				'like',
				'%' . $keyword . '%' 
		);
		return $this->where ( $map )->order ( $order )->page ( $page, 10 )->select ();
	}
	public function getBooks($page = 1) {
		return $this->page ( $page, 4 )->order ( 'bo_nu desc' )->select ();
	}
}