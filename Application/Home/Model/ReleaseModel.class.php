<?php

namespace Home\Model;

use Think\Model;

class ReleaseModel extends Model {
	public function addRelease($us_nu, $bo_nu, $re_pr, $re_le, $re_de, $re_st, $re_re) {
		$data ['us_nu'] = $us_nu;
		$data ['bo_nu'] = $bo_nu;
		$data ['re_pr'] = $re_pr;
		$data ['re_le'] = $re_le;
		$data ['re_de'] = $re_de;
		$data ['re_st'] = $re_st;
		$data ['re_re'] = $re_re;
		return $this->add ( $data );
	}
	public function deleteRelease($re_nu) {
		return $this->delete ( $re_nu );
	}
	public function updateRelease($re_nu, $data) {
		$condition ['re_nu'] = $re_nu;
		return $this->where ( $condition )->save ( $data );
	}
	public function getRelease($re_nu) {
		$condition ['re_nu'] = $re_nu;
		return $this->where ( $condition )->limit ( 1 )->select ();
	}
	public function getUserRelease($us_nu, $page = 1) {
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
	public function getBookRelease($bo_nu, $page = 1) {
		$condition ['bo_nu'] = $bo_nu;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
}