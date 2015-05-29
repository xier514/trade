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
			if (check_verify ( I ( 'POST.imgvcode' ), 1 )) {
				if (I ( 'POST.reg_account' ) && I ( 'POST.reg_password' )) {
					if (I ( 'POST.reg_password' ) && I ( 'POST.reg_password' ) == I ( 'POST.reg_password' )) {
					} else {
						$this->error ( '确认密码错误' );
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