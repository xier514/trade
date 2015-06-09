<?php

namespace Home\Controller;

use Think\Controller;

class PasswordController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			$this->display ();
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function changePassword() {
		if (IS_POST) {
			$user = D ( 'User' )->getUser ( session ( 'us_nu' ) );
			if ($user [0] ['us_pw'] == md5 ( I ( 'POST.old_pas' ) )) {
				if (I ( 'POST.new_pas' ) == I ( 'POST.re_new_pas' )) {
					$data ['us_pw'] = md5 ( I ( 'POST.new_pas' ) );
					if (D ( 'User' )->updateUser ( session ( 'us_nu' ), $data )) {
						$this->success ( '修改密码成功' );
					} else {
						$this->error ( '修改失败，请稍后重试' );
					}
				} else {
					$this->error ( '两次输入的密码不一致' );
				}
			} else {
				$this->error ( '原密码错误' );
			}
		} else 

		{
			$this->error ( '没有输入数据' );
		}
	}
}