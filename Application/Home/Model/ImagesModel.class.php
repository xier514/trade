<?php

namespace Home\Model;

use Think\Model;

class ImagesModel extends Model {
	public function addImages($re_nu, $im_pa) {
		$data ['re_nu'] = $re_nu;
		$data ['im_pa'] = $im_pa;
		return $this->add ( $data );
	}
	public function setImages($re_nu, $im_pa) {
		$condition ['re_nu'] = $re_nu;
		$this->where ( $condition )->setField ( 'im_pa', $im_pa );
	}
	public function getImages($re_nu) {
		$conditon ['re_nu'] = $re_nu;
		return $this->where ( $condition )->select ();
	}
}