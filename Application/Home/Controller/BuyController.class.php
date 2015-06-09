<?php

namespace Home\Controller;

use Think\Controller;

class BuyController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				$this->assign ( 'buy', D ( 'Deal' )->getBuyDeal ( session ( 'us_nu' ) ) );
				$this->assign ( 'amount', D ( 'Notice' )->getUnreadNoticeAmount ( session ( 'us_nu' ) ) );
				$this->display ();
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function change($de_nu, $de_st) {
		if ($de_st == 2 || $de_st == 0) {
			D ( 'Deal' )->setDealState ( ( int ) $de_nu, ( int ) $de_st );
			$this->success ( '交易状态已改变', U ( 'Buy/index' ) );
		} else {
			$this->error ( '非法操作' );
		}
	}
}