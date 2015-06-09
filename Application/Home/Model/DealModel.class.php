<?php

namespace Home\Model;

use Think\Model;

class DealModel extends Model {
	public function addDeal($bo_nu, $us_nu, $de_ti, $de_re, $de_st) {
		$data ['bo_nu'] = $bo_nu;
		$data ['us_nu'] = $us_nu;
		$data ['de_ti'] = $de_ti;
		$data ['de_re'] = $de_re;
		$data ['de_st'] = $de_st;
		return $this->add ( $data );
	}
	public function deleteDeal($de_nu) {
		return $this->delete ( $de_nu );
	}
	public function setDealState($de_nu, $de_st) {
		$condition ['de_nu'] = $de_nu;
		return $this->where ( $condition )->setField ( 'de_st', $de_st );
	}
	public function getDeal($de_nu) {
		$condition ['de_nu'] = $de_nu;
		return $this->where ( $condition )->join ( 'book ON deal.bo_nu = book.bo_nu' )->limit ( 1 )->select ();
	}
	public function getBuyDeal($us_nu, $page = 1) {
		$condition ['deal.us_nu'] = $us_nu;
		return $this->where ( $condition )->join ( 'book ON deal.bo_nu = book.bo_nu' )->page ( $page, 10 )->select ();
	}
	public function checkDeal($bo_nu, $us_nu) {
		$condition ['bo_nu'] = $bo_nu;
		$condition ['us_nu'] = $us_nu;
		$data = $this->where ( $condition )->limit ( 1 )->select ();
		if (isset ( $data )) {
			return true;
		} else
			return false;
	}
}