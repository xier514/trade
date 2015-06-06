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
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
}