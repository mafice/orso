<?php 
require_once('PHPUnit/Autoload.php');
require_once('./hoge.php'); // テスト対象のコードを読み込む

class hoge_test extends PHPUnit_Framework_TestCase {
	public function provider() {
		return array(array( new Hoge( 2, 3 ) ));
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testPlus1( $obj ) {
		$this->assertEquals( 5, $obj->plusSelf() );
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testMinus1( $obj ) {
		$this->assertEquals( -1, $obj->minusSelf() );
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testPlus2( $obj ) {
		$this->assertEquals( 6, $obj->plusSelf() ); // 失敗例
	}
	
	/**
	 * @dataProvider provider
	 */
	public function testMinus2( $obj ) {
		$this->assertEquals( -123, $obj->minusSelf() );
	}
	
	public function testPlus3() {
		$obj = new Hoge( 100, 123 );
		$this->assertEquals( 223, $obj->plusSelf() );
	}
	
	public function testPlus4() {
		$obj = new Hoge( 1, 1 );
		$this->assertEquals( 5, $obj->plus( 2, 3 ) );
		$this->assertEquals( 5, $obj->plus( 3, 2 ) );
		$this->assertEquals( 123, $obj->plus( 23, 100 ) );
	}
}