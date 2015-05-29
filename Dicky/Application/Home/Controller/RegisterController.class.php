<?php

namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller {
	public function index() {
		$this->display ();
	}
	public function userRegister() {
		if (IS_POST) {
			$reg = M ( 'Login' );
			$rules = array (
					array (
							'lo_id',
							'require',
							'用户名不能为空' 
					),
					array (
							'lo_id',
							'/^[a-zA-Z]\w{2,19}$/',
							'用户名请以字母开头，并且由3-20位字母、数字或下划线组成',
							0,
							'regex' 
					),
					array (
							'lo_id',
							'',
							'用户名已存在',
							0,
							'unique' 
					),
					array (
							'lo_pw',
							'require',
							'密码不能为空' 
					),
					array (
							'lo_repw',
							'require',
							'确认密码不能为空' 
					),
					array (
							'lo_repw',
							'lo_pw',
							'确认密码不正确',
							0,
							'confirm' 
					),
					array (
							'ci_nu',
							'require',
							'请选择城市' 
					),
					array (
							'lo_wx',
							'/^\w*$/',
							'微信号请由字母、数字或下划线组成',
							0,
							'regex' 
					),
					array (
							'lo_ph',
							'require',
							'手机号不能为空' 
					),
					array (
							'lo_ph',
							'/^\d{1,11}$/',
							'请输入正确的手机号（纯数字）',
							0,
							'regex' 
					),
					array (
							'lo_ph',
							'',
							'手机号已存在',
							0,
							'unique' 
					) 
			);
			if (! $reg->validate ( $rules )->create ()) {
				echo $reg->getError ();
			} else {
				$reg->lo_ac = 1;
				$reg->lo_st = 0;
				$reg->lo_pw = md5 ( $reg->lo_pw );
				if ($reg->add ()) {
					$this->success ( '注册成功，即将返回登录页面', U ( 'Login/index' ), 3 );
				} else {
					$this->error ( '注册失败，请重试' );
				}
			}
		} else {
			$this->error ( '非法请求' );
		}
	}
}