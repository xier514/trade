<?php

namespace Home\Model;

use Think\Model;

class NoticeModel extends Model {
	public function addNotice($us_nu, $no_co, $no_st) {
		$data ['us_nu'] = $us_nu;
		$data ['no_co'] = $no_co;
		$data ['no_st'] = $no_st;
		return $this->add ( $data );
	}
	public function deleteNotice($no_nu) {
		return $this->delete ( $no_nu );
	}
	public function setNoticeState($no_nu, $no_st) {
		$condition ['no_nu'] = $no_nu;
		$this->where ( $condition )->setField ( 'no_st', $no_st );
	}
	public function getNotice($no_nu) {
		$condition ['no_nu'] = $no_nu;
		return $this->where ( $condition )->limit ( 1 )->select ();
	}
	public function getUnreadNoticeAmount($us_nu) {
		$condition ['us_nu'] = $us_nu;
		$condition ['no_st'] = 0;
		return $this->where ( $condition )->count ();
	}
	public function getUserNotice($us_nu, $page = 1) {
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
}