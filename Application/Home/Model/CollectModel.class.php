<?php

namespace Home\Model;

use Think\Model;

class CollectModel extends Model {
	public function addCollect($us_nu, $bo_nu) {
		$data ['us_nu'] = $us_nu;
		$data ['bo_nu'] = $bo_nu;
		return $this->add ( $data );
	}
	public function deleteCollect($co_nu) {
		return $this->delete ( $co_nu );
	}
	public function getCollect($us_nu, $page = 1) {
		$condition ['collect.us_nu'] = $us_nu;
		return $this->where ( $condition )->join ( 'book ON collect.bo_nu = book.bo_nu' )->page ( $page, 10 )->select ();
	}
	public function getOneCollect($us_nu, $bo_nu) {
		$condition ['us_nu'] = $us_nu;
		$condition ['bo_nu'] = $bo_nu;
		$data = $this->where ( $condition )->select ();
		if (isset ( $data )) {
			return true;
		} else
			return false;
	}
}