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
	public function perfect() {
		if (IS_POST) {
			$data ['us_na'] = I ( 'POST.per_name' );
			$data ['us_ph'] = I ( 'POST.per_mobile' );
			$data ['us_wx'] = I ( 'POST.per_weixin' );
			$data ['us_qq'] = I ( 'POST.per_QQ' );
			$data ['us_em'] = I ( 'POST.per_email' );
			$data ['us_ca'] = I ( 'POST.per_area' );
			$data ['us_ad'] = I ( 'POST.per_address' );
			if ($data ['us_na'] && $data ['us_ph'] && $data ['us_ca']) {
				if (! $this->phoneConflict ( $data ['us_ph'] )) {
					if (D ( 'User' )->addUserData ( session ( 'us_nu' ), $data ['us_na'], $data ['us_ph'], $data ['us_wx'], $data ['us_qq'], $data ['us_em'], $data ['us_ca'], $data ['us_ad'] )) {
						session ( 'us_ty', 1 );
						$this->success ( '已完善资料', U ( 'Index/index' ) );
					} else {
						$this->error ( '提交失败，请稍后再试' );
					}
				} else {
					$this->error ( '手机号已存在' );
				}
			} else {
				$this->error ( '必填项不能为空' );
			}
		} else {
			$this->error ( '非法操作' );
		}
	}
	public function phoneConflict($us_ph) {
		if ($us_ph) {
			return D ( 'User' )->phoneConflict ( $us_ph );
		}
		return false;
	}
}