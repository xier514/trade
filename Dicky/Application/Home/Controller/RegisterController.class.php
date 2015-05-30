<?php

namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller {
	public function index() {
		$this->display ();
	}
	public function verify($id = 1) {
		$config = array (
				'length' => 4 
		);
		$Verify = new \Think\Verify ( $config );
		$Verify->entry ( $id );
	}
	public function userRegister() {
		if (IS_POST) {
			if (check_verify ( I ( 'POST.reg_vcode' ), 1 )) {
				if (I ( 'POST.reg_account' ) && I ( 'POST.reg_password' )) {
					if (! D ( 'User' )->idConflict ( I ( 'POST.reg_account' ) )) {
						if (I ( 'POST.reg_re_password' ) && I ( 'POST.reg_re_password' ) == I ( 'POST.reg_re_password' )) {
							D ( 'User' )->reg ( I ( 'POST.reg_account' ), I ( 'POST.reg_password' ) );
							$this->success ( '成功', U ( 'Login/index' ) );
						} else {
							$this->ajaxReturn ( '确认密码错误' );
						}
					} else {
						$this->ajaxReturn ( '该账号已存在' );
					}
				} else {
					$this->ajaxReturn ( '账号或密码不能为空' );
				}
			} else {
				$this->ajaxReturn ( '验证码错误' );
			}
		} else {
			$this->ajaxReturn ( '非法请求' );
		}
	}
}