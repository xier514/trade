<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
	public function index() {
		$this->assign ( 'type', D ( 'Type' )->getAllType () );
		$this->assign ( 'bookList1', D ( 'Book' )->getBooks ( 1 ) );
		$this->assign ( 'bookList2', D ( 'Book' )->getBooks ( 2 ) );
		$this->assign ( 'bookList3', D ( 'Book' )->getBooks ( 3 ) );
		$this->assign ( 'bookList4', D ( 'Book' )->getBooks ( 4 ) );
		$this->assign ( 'amount', D ( 'Notice' )->getUnreadNoticeAmount ( session ( 'us_nu' ) ) );
		$this->display ();
	}
}