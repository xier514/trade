<?php

namespace Home\Controller;

use Think\Controller;

class AlterSaleController extends Controller {
	public function index($bo_nu) {
		if (session ( 'us_nu' )) {
			$book = D ( 'Book' )->getBook ( ( int ) $bo_nu );
			if ($book [0] ['us_nu'] == session ( 'us_nu' )) {
				$this->assign ( 'subtype', D ( 'Subtype' )->getAllSubtype () );
				$this->assign ( 'book', $book [0] );
				$this->display ();
			} else {
				$this->error ( '你没有修改权限' );
			}
		} else {
			$this->error ( '你没有登录', U ( 'Login/index' ) );
		}
	}
	public function alter() {
		if (IS_POST) {
			if (I ( 'POST.photo1' ) || I ( 'POST.photo2' )) {
				$info = A ( 'Sale' )->upload ();
				if (I ( 'POST.photo1' )) {
					$data ['bo_co'] = $info ['photo1'] ['savename'];
				}
				if (I ( 'POST.photo2' )) {
					$data ['bo_pi'] = $info ['photo2'] ['savename'];
				}
			}
			$data ['su_nu'] = I ( 'POST.style' );
			$data ['bo_na'] = I ( 'POST.goods_name' );
			$data ['bo_pu'] = I ( 'POST.goods_public' );
			$data ['bo_au'] = I ( 'POST.goods_author' );
			$data ['bo_or'] = I ( 'POST.goods_version' );
			$data ['bo_su'] = I ( 'POST.goods_summary' );
			$data ['bo_pr'] = I ( 'POST.goods_price' );
			$data ['bo_le'] = I ( 'POST.goods_amount' );
			$data ['bo_de'] = I ( 'POST.goods_new' );
			$data ['bo_re'] = I ( 'POST.goods_remark' );
			if ($data ['su_nu'] && $data ['bo_na'] && $data ['bo_pu'] && $data ['bo_au'] && $data ['bo_or'] && $data ['bo_su'] && $data ['bo_pr'] && $data ['bo_le'] && $data ['bo_de']) {
				$state = D ( 'Book' )->updateBook ( I ( 'POST.bo_nu' ), $data );
				if ($state) {
					$this->success ( '修改成功', U ( 'home/Book/index/' . I ( 'POST.bo_nu' ) ) );
				} else if ($state === 0) {
					$this->error ( '没有信息被修改' );
				} else {
					$this->error ( '修改失败，请稍后重试' );
				}
			} else {
				$this->error ( '请填写完整信息' );
			}
		}
	}
}