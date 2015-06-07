<?php

namespace Home\Controller;

use Think\Controller;

class ListController extends Controller {
	public function index($ty_nu, $su_nu = 0, $order = 0) {
		$type = D ( 'Type' )->getType ( ( int ) $ty_nu );
		if (isset ( $type [0] )) {
			$subtype = D ( 'Subtype' )->getSubType ( ( int ) $ty_nu );
			if (( int ) $su_nu) {
				foreach ( $subtype as $k => $v ) {
					if ($v ['su_nu'] == ( int ) $su_nu) {
						$this->assign ( 'typeDetail', $v );
						switch (( int ) $order) {
							case 1 :
								$this->assign ( 'bookList', D ( 'Book' )->getSubBooksList ( ( int ) $su_nu, 'bo_pr asc' ) );
								break;
							case 2 :
								$this->assign ( 'bookList', D ( 'Book' )->getSubBooksList ( ( int ) $su_nu, 'bo_de desc' ) );
								break;
							default :
								$this->assign ( 'bookList', D ( 'Book' )->getSubBooksList ( ( int ) $su_nu, 'bo_nu' ) );
						}
						break;
					}
				}
			} else {
				switch (( int ) $order) {
					case 1 :
						$this->assign ( 'bookList', D ( 'Type' )->getBooksList ( ( int ) $ty_nu, 'bo_pr asc' ) );
						break;
					case 2 :
						$this->assign ( 'bookList', D ( 'Type' )->getBooksList ( ( int ) $ty_nu, 'bo_de desc' ) );
						break;
					default :
						$this->assign ( 'bookList', D ( 'Type' )->getBooksList ( ( int ) $ty_nu, 'bo_nu' ) );
				}
			}
			$this->assign ( 'su_nu', $su_nu );
			$this->assign ( 'order', ( int ) $order );
			$this->assign ( 'type', $type [0] );
			$this->assign ( 'subtype', $subtype );
			$this->display ();
		} else {
			$this->error ( '输入网址有误' );
		}
	}
}