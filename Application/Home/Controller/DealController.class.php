<?php

namespace Home\Controller;

use Think\Controller;

class DealController extends Controller {
	public function index($bo_nu) {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				$book = D ( 'Book' )->getBook ( ( int ) $bo_nu );
				$this->assign ( 'book', $book [0] );
				$seller = D ( 'User' )->getUser ( $book [0] ['us_nu'] );
				if ($book [0] ['bo_st'] != 0) {
					if ($seller [0] ['us_nu'] != session ( 'us_nu' )) {
						$this->assign ( 'seller', $seller [0] );
						$customer = D ( 'User' )->getUser ( session ( 'us_nu' ) );
						$this->assign ( 'customer', $customer [0] );
						$subtype = D ( 'Subtype' )->getType ( $book [0] ['su_nu'] );
						$this->assign ( 'typeDetail', $subtype [0] );
						$type = D ( 'Type' )->getType ( $subtype [0] ['ty_nu'] );
						$this->assign ( 'type', $type [0] );
						$subtype = D ( 'Subtype' )->getSubType ( $type [0] ['ty_nu'] );
						$this->assign ( 'subtype', $subtype );
						$this->assign ( 'amount', D ( 'Notice' )->getUnreadNoticeAmount ( session ( 'us_nu' ) ) );
						$this->order ( ( int ) $bo_nu, $book [0] ['bo_na'], $customer [0] ['us_na'], $customer [0] ['us_ph'], $seller [0] ['us_nu'] );
						$this->display ();
					} else {
						$this->error ( '你不能交易自己发布的二手书' );
					}
				} else {
					$this->error ( '发布已关闭，不能交易' );
				}
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function order($bo_nu, $bo_na, $us_na, $us_ph, $us_nu) {
		if (! D ( 'Deal' )->checkDeal ( $bo_nu, session ( 'us_nu' ) )) {
			D ( 'Deal' )->addDeal ( $bo_nu, session ( 'us_nu' ), date ( "Y-m-d H:i:s" ), '', 1 );
			$str = '你的二手书： ' . $bo_na . ' 已经有买家请求交易。买家用户名为： ' . $us_na . ' ,手机号为： ' . $us_ph . ' 预祝你们交易成功。';
			D ( 'Notice' )->addNotice ( $us_nu, $str, 0 );
		} else {
			$this->error ( '不能重复交易' );
		}
	}
}