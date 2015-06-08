<?php

namespace Home\Controller;

use Think\Controller;

class InformationController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				$this->assign ( 'user', D ( 'User' )->getUser ( session ( 'us_nu' ) ) );
				$this->display ();
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function alter() {
		if (IS_POST) {
			$data ['us_na'] = I ( 'POST.per_name' );
			$data ['us_ph'] = I ( 'POST.per_mobile' );
			$data ['us_wx'] = I ( 'POST.per_weixin' );
			$data ['us_qq'] = I ( 'POST.per_QQ' );
			$data ['us_em'] = I ( 'POST.per_email' );
			$data ['us_ca'] = I ( 'POST.per_area' );
			$data ['us_ad'] = I ( 'POST.per_address' );
			if ($data ['us_na'] && $data ['us_ph'] && $data ['us_ca']) {
				if (! A ( 'Perfect' )->phoneConflict ( $data ['us_ph'] )) {
					$state = D ( 'User' )->updateUser ( session ( 'us_nu' ), $data );
					if ($state) {
						$this->success ( '已修改资料' );
					} else if ($state === null) {
						$this->error ( '提交失败，请稍后再试' );
					} else {
						$this->error ( '未修改资料' );
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
}