<?php

namespace Home\Controller;

use Think\Controller;

class SearchController extends Controller {
	public function index($keyword, $order = 0) {
		if ($keyword) {
			$type = D ( 'Type' )->getType ( 1 );
			$subtype = D ( 'Subtype' )->getSubType ( 1 );
			$this->assign ( 'keyword', $keyword );
			$this->assign ( 'order', ( int ) $order );
			$this->assign ( 'type', $type [0] );
			$this->assign ( 'subtype', $subtype );
			switch (( int ) $order) {
				case 1 :
					$this->assign ( 'bookList', D ( 'Book' )->searchBooksList ( $keyword, 'bo_pr asc' ) );
					break;
				case 2 :
					$this->assign ( 'bookList', D ( 'Book' )->searchBooksList ( $keyword, 'bo_de desc' ) );
					break;
				default :
					$this->assign ( 'bookList', D ( 'Book' )->searchBooksList ( $keyword, 'bo_nu' ) );
			}
			$this->display ( 'index' );
		} else {
			$this->error ( '请输入关键字' );
		}
	}
	public function search() {
		$this->index ( I ( 'get.keyword' ) );
	}
}