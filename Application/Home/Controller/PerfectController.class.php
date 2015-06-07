<?php

namespace Home\Controller;

use Think\Controller;

class PerfectController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->display ();
			} else {
				$this->error ( '您的资料已经完善', U ( 'Index/index' ) );
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
}