<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
	public function reg($us_id, $us_pw) {
		$data ['us_id'] = $us_id;
		$data ['us_pw'] = md5 ( $us_pw );
		$this->add ( $data );
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