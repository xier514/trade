<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
	public function reg($us_id, $us_pw) {
		$data ['us_id'] = $us_id;
		$data ['us_pw'] = md5 ( $us_pw );
		$this->add ( $data );
	}
	public function addUserData($us_na, $us_ca, $us_ty, $us_st, $us_ph, $us_wx, $us_qq, $us_em, $us_ad) {
		$data ['us_na'] = $us_na;
		$data ['us_ca'] = $us_ca;
		$data ['us_ty'] = $us_ty;
		$data ['us_st'] = $us_st;
		$data ['us_ph'] = $us_ph;
		$data ['us_wx'] = $us_wx;
		$data ['us_qq'] = $us_qq;
		$data ['us_em'] = $us_em;
		$data ['us_ad'] = $us_ad;
		return $this->add ( $data );
	}
	public function DeleteUser($us_nu) {
		return $this->delete ( $us_nu );
	}
	public function updateUser($us_nu, $data) {
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->save ( $data );
	}
	public function setUserState($us_nu, $us_st) {
		$condition ['us_nu'] = $us_nu;
		$this->where ( $condition )->setField ( 'us_st', $us_st );
	}
	public function getUser($us_nu) {
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->limit ( 1 )->select ();
	}
	public function getAllUser($page = 1) {
		return $this->page ( $page, 10 )->select ();
	}
	public function getFreezingUser($page = 1) {
		$condition ['us_st'] = 1;
		return $this->where ( $condition )->page ( $page, 10 )->select ();
	}
	public function log($us_id, $us_pw) {
		$condition ['us_id'] = $us_id;
		$data = $this->where ( $condition )->limit ( 1 )->select ();
		if (isset ( $data [0] ) && $data [0] ['us_pw'] == md5 ( $us_pw )) {
			return true;
		} else {
			return false;
		}
	}
	public function idConflict($us_id = 0) {
		$condition ['us_id'] = $us_id;
		$data = $this->where ( $condition )->limit ( 1 )->select ();
		if (isset ( $data [0] )) {
			return true;
		} else
			return false;
	}
}