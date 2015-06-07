<?php

namespace Home\Controller;

use Think\Controller;

class TestController extends Controller {
	public function index() {
		dump(D ( 'Type' )->getBooksList(1));
	}
}