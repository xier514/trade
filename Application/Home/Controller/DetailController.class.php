<?php

namespace Home\Controller;

use Think\Controller;

class DetailController extends Controller {
	public function index($typeId = 0) {
		$type = D ( 'Type' )->getType ( '教材' );
		if ($typeId) {
			foreach ( $type as $k => $v ) {
				if ($v ['ty_nu'] == ( int ) $typeId) {
					$typeDetail = $v ['ty_su'];
				}
			}
			$this->assign ( 'typeDetail', $typeDetail );
			$this->assign ( 'bookList', D ( 'Book' )->getBookList ( $typeId, $page = 1 ) );
		} else
			$this->assign ( 'bookList', D ( 'Book' )->getAllBooks () );
		$this->assign ( 'type', $type );
		$this->display ();
	}
}