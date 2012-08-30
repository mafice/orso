<?php
class Hoge {
	var $a;
	var $b;
	
	/**
	 * コンストラクタ
	 */
	function __construct( $a, $b ) {
		$this->a = $a;
		$this->b = $b;
	}
	
	/**
	 * 加算
	 * @param number $a
	 * @param number $b
	 */
	public function plus( $a, $b ) {
		return $a + $b;
	}
	
	/**
	 * 加算
	 */
	public function plusSelf() {
		return $this->plus( $this->a, $this->b );
	}
	
	/**
	 * 減算
	 * @param number $a
	 * @param number $b
	 */
	public function minus( $a, $b ) {
		return $a + $b;
	}
	
	/**
	 * 減算
	 */
	public function minusSelf() {
		return $this->a - $this->b;
	}
}