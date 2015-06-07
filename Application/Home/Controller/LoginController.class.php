<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller {
	public function index() {
		$this->display ();
	}
	public function userLogin() {
		if (IS_POST) {
			if (check_verify ( I ( 'POST.captcha' ) )) {
				if (I ( 'POST.username' ) && I ( 'POST.password' )) {
					$data = D ( 'User' )->log ( I ( 'POST.username' ), I ( 'POST.password' ) );
					if ($data) {
						session ( 'us_nu', $data ['us_nu'] );
						session ( 'us_id', $data ['us_id'] );
						if (! $data ['us_ty']) {
							session ( 'us_ty', $data ['us_ty'] );
							$this->success ( '请先完善个人资料', U ( 'Perfect/index' ) );
						} else {
							session ( 'us_na', $data ['us_na'] );
							$this->success ( '登录成功', U ( 'Index/index' ) );
						}
					} else {
						$this->error ( '账号或密码错误' );
					}
				} else {
					$this->error ( '账号和密码不能为空' );
				}
			} else {
				$this->error ( '验证码错误' );
			}
		} else {
			$this->error ( '非法请求' );
		}
	}
}