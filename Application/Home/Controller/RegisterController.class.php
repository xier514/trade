<?php

namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller {
	public function index() {
		$this->display ();
	}
	public function verify($id = 1) {
		$config = array (
				'length' => 4,
				'useCurve' => false 
		);
		$Verify = new \Think\Verify ( $config );
		$Verify->entry ( $id );
	}
	public function idConflict($reg_account) {
		if ($reg_account) {
			$this->ajaxReturn ( D ( 'User' )->idConflict ( $reg_account ) );
		}
		$this->ajaxReturn ( false );
	}
	public function checkVerify($reg_vcode) {
		if ($reg_vcode && $num) {
			if (check_verify ( $reg_vcode, 1 )) {
				$this->ajaxReturn ( true );
			}
		}
		$this->ajaxReturn ( false );
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
							$this->error ( '确认密码错误' );
						}
					} else {
						$this->error ( '该账号已存在' );
					}
				} else {
					$this->error ( '账号或密码不能为空' );
				}
			} else {
				$this->error ( '验证码错误' );
			}
		} else {
			$this->error ( '非法请求' );
		}
	}
}