<?php

namespace Home\Controller;

use Think\Controller;

class ListController extends Controller {
	public function index($ty_nu, $su_nu = 0) {
		$type = D ( 'Type' )->getType ( ( int ) $ty_nu );
		if (isset ( $type [0] )) {
			$subtype = D ( 'Subtype' )->getSubType ( ( int ) $ty_nu );
			if (( int ) $su_nu) {
				foreach ( $subtype as $k => $v ) {
					if ($v ['su_nu'] == ( int ) $su_nu) {
						$this->assign ( 'typeDetail', $v ['su_na'] );
						$this->assign ( 'bookList', D ( 'Book' )->getSubBooksList ( ( int ) $su_nu ) );
						break;
					}
				}
			} else {
				$this->assign ( 'bookList', D ( 'Type' )->getBooksList ( ( int ) $ty_nu ) );
			}
			$this->assign ( 'type', $type [0] );
			$this->assign ( 'subtype', $subtype );
			$this->display ();
		} else {
			$this->error ( '输入网址有误' );
		}
	}
}