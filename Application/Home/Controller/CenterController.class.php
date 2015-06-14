<?php

namespace Home\Controller;

use Think\Controller;

class CenterController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				$this->assign ( 'notice', D ( 'Notice' )->getUserNotice ( session ( 'us_nu' ) ) );
				$this->display ();
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function read($no_nu) {
		D ( 'Notice' )->setNoticeState ( ( int ) $no_nu, 1 );
	}
	public function delete($no_nu) {
		if (D ( 'Notice' )->deleteNotice ( ( int ) $no_nu )) {
			$this->success ( '删除成功' );
		}
	}
}