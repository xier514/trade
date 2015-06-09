<?php

namespace Home\Controller;

use Think\Controller;

class SellController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				$this->assign ( 'sale', D ( 'User' )->getSaleDeal ( session ( 'us_nu' ) ) );
				$this->display ();
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function close($bo_nu) {
		$state = D ( 'Book' )->setBookState ( ( int ) $bo_nu, 0 );
		if ($state)
			$this->success ( '交易已关闭' );
		else if ($state === null)
			$this->error ( '交易关闭失败，请稍后再试' );
	}
}