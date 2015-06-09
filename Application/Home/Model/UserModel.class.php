<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
	public function reg($us_id, $us_pw) {
		$data ['us_id'] = $us_id;
		$data ['us_pw'] = md5 ( $us_pw );
		$data ['us_ty'] = 0;
		return $this->add ( $data );
	}
	public function addUserData($us_nu, $us_na, $us_ph, $us_wx, $us_qq, $us_em, $us_ca, $us_ad) {
		$condition ['us_nu'] = $us_nu;
		$data ['us_ty'] = 1;
		$data ['us_na'] = $us_na;
		$data ['us_ph'] = $us_ph;
		$data ['us_wx'] = $us_wx;
		$data ['us_qq'] = $us_qq;
		$data ['us_em'] = $us_em;
		$data ['us_ca'] = $us_ca;
		$data ['us_ad'] = $us_ad;
		return $this->where ( $condition )->save ( $data );
	}
	public function DeleteUser($us_nu) {
		return $this->delete ( $us_nu );
	}
	public function updateUser($us_nu, $data) {
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->save ( $data );
	}
	public function getUser($us_nu) {
		$condition ['us_nu'] = $us_nu;
		return $this->where ( $condition )->limit ( 1 )->select ();
	}
	public function getAllUser($page = 1) {
		return $this->page ( $page, 10 )->select ();
	}
	public function getSaleDeal($us_nu, $page = 1) {
		$condition ['user.us_nu'] = $us_nu;
		return $this->where ( $condition )->join ( 'book ON user.us_nu = book.us_nu' )->join ( 'deal ON book.bo_nu = deal.bo_nu' )->page ( $page, 10 )->select ();
	}
	public function log($us_id, $us_pw) {
		$condition ['us_id'] = $us_id;
		$data = $this->where ( $condition )->limit ( 1 )->select ();
		if (isset ( $data [0] ) && $data [0] ['us_pw'] == md5 ( $us_pw )) {
			return $data [0];
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
	public function phoneConflict($us_ph = 0) {
		$condition ['us_ph'] = $us_ph;
		$data = $this->where ( $condition )->limit ( 1 )->select ();
		if (isset ( $data [0] )) {
			return true;
		} else
			return false;
	}
}