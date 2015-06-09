<?php

namespace Home\Controller;

use Think\Controller;

class BookController extends Controller {
	public function index($bo_nu) {
		$book = D ( 'Book' )->getBook ( ( int ) $bo_nu );
		if (isset ( $book [0] )) {
			$subtype = D ( 'Subtype' )->getType ( $book [0] ['su_nu'] );
			$this->assign ( 'typeDetail', $subtype [0] );
			$type = D ( 'Type' )->getType ( $subtype [0] ['ty_nu'] );
			$this->assign ( 'type', $type [0] );
			$subtype = D ( 'Subtype' )->getSubType ( $type [0] ['ty_nu'] );
			$this->assign ( 'subtype', $subtype );
			$this->assign ( 'book', $book [0] );
			$this->assign ( 'amount', D ( 'Notice' )->getUnreadNoticeAmount ( session ( 'us_nu' ) ) );
			$this->display ();
		} else {
			$this->error ( '二手书不存在' );
		}
	}
}