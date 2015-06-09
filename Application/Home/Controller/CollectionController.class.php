<?php

namespace Home\Controller;

use Think\Controller;

class CollectionController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				$this->assign ( 'collect', D ( 'Collect' )->getCollect ( session ( 'us_nu' ) ) );
				$this->assign ( 'amount', D ( 'Notice' )->getUnreadNoticeAmount ( session ( 'us_nu' ) ) );
				$this->display ();
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function add($bo_nu) {
		if (session ( 'us_nu' )) {
			if (! session ( 'us_ty' )) {
				$this->error ( '请先完善资料', U ( 'Perfect/index' ) );
			} else {
				if (! D ( 'Collect' )->getOneCollect ( session ( 'us_nu' ), ( int ) $bo_nu )) {
					if (D ( 'Collect' )->addCollect ( session ( 'us_nu' ), ( int ) $bo_nu )) {
						$this->success ( '收藏成功' );
					} else {
						$this->error ( '收藏失败，请稍后再试' );
					}
				} else {
					$this->error ( '你已收藏' );
				}
			}
		} else {
			$this->error ( '请先登录', U ( 'Login/index' ) );
		}
	}
	public function delete($co_nu) {
		if (D ( 'Collect' )->deleteCollect ( ( int ) $co_nu )) {
			$this->success ( '取消收藏成功' );
		} else {
			$this->error ( '取消收藏失败，请稍后再试' );
		}
	}
}