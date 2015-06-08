<?php

namespace Home\Controller;

use Think\Controller;

class SaleController extends Controller {
	public function index() {
		if (session ( 'us_nu' )) {
			if (session ( 'us_ty' )) {
				$this->assign ( 'subtype', D ( 'Subtype' )->getAllSubtype () );
				$this->display ();
			} else {
				$this->error ( '您的资料尚未完善', U ( 'Perfect/index' ) );
			}
		} else {
			$this->error ( '你没有登录', U ( 'Login/index' ) );
		}
	}
	public function forSale() {
		if (IS_POST) {
			$info = $this->upload ();
			$data ['bo_co'] = $info ['photo1'] ['savename'];
			$data ['bo_pi'] = $info ['photo2'] ['savename'];
			$data ['su_nu'] = I ( 'POST.style' );
			$data ['us_nu'] = session ( 'us_nu' );
			$data ['bo_na'] = I ( 'POST.goods_name' );
			$data ['bo_pu'] = I ( 'POST.goods_public' );
			$data ['bo_au'] = I ( 'POST.goods_author' );
			$data ['bo_or'] = I ( 'POST.goods_version' );
			$data ['bo_su'] = I ( 'POST.goods_summary' );
			$data ['bo_pr'] = I ( 'POST.goods_price' );
			$data ['bo_le'] = I ( 'POST.goods_amount' );
			$data ['bo_de'] = I ( 'POST.goods_new' );
			$data ['bo_re'] = I ( 'POST.goods_remark' );
			$data ['bo_st'] = 1;
			if ($data ['su_nu'] != 0 && $data ['bo_na'] && $data ['bo_pu'] && $data ['bo_au'] && $data ['bo_or'] && $data ['bo_su'] && $data ['bo_pr'] && $data ['bo_le'] && $data ['bo_de'] && $data ['bo_co']) {
				$book = D ( 'Book' )->addBook ( $data ['su_nu'], $data ['us_nu'], $data ['bo_na'], $data ['bo_pu'], $data ['bo_au'], $data ['bo_or'], $data ['bo_su'], $data ['bo_co'], $data ['bo_pr'], $data ['bo_le'], $data ['bo_de'], $data ['bo_re'], $data ['bo_pi'], $data ['bo_st'] );
				if ($book) {
					$this->success ( '添加成功', U ( 'home/Book/index/' . $book ) );
				} else {
					$this->error ( '添加失败，请稍后重试' );
				}
			} else {
				$this->error ( '请填写完整信息' );
			}
		}
	}
	public function upload() {
		$upload = new \Think\Upload ();
		$upload->maxSize = 3145728;
		$upload->autoSub = false;
		$upload->exts = array (
				'jpg' 
		);
		$upload->rootPath = './';
		$upload->savePath = './Public/images/book/';
		$info = $upload->upload ();
		if (! $info) {
			$this->error ( $upload->getError () );
		} else {
			return $info;
		}
	}
}