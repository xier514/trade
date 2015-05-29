<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
	public function reg($us_id, $us_pw) {
		$data ['us_id'] = $us_id;
		$data ['us_pw'] = md5 ( $us_pw );
		$this->add ( $data );
	}
}