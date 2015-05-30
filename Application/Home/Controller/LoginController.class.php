<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller {
	public function index() {
		$this->display ();
	}
	public function userLogin() {
		if (IS_POST) {
			if (check_verify ( I ( 'POST.captcha' ), 1 )) {
				if (I ( 'POST.username' ) && I ( 'POST.password' )) {
					if (D ( 'User' )->log ( I ( 'POST.username' ), I ( 'POST.password' ) )) {
						$this->success ( '登录成功', U ( 'Index/index' ) );
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