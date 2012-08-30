/**
 * Hogeクラスのテストコード
 */

module('Hogeクラスの同期的なメソッドをテストする');

test('加算関連', function() {
	equal( Hoge.plus( 1, 2 ), 3, '1 + 2' );
	equal( Hoge.plus( 1.5, 10 ), 11.5, '1.5 + 10' );
	equal( Hoge.plus( 2, 2 ), 5, '2 + 2（期待値が間違っているケース）' ); // 失敗例
	equal( Hoge.plus( 2, 2 ), 4, '2 + 2' ); // 失敗例
});

test('減算関連', function() {
	equal( Hoge.minus( 2, 1 ), 1, '2 - 1' );
	equal( Hoge.minus( 1, 2 ), -1, '1 - 2' );
	equal( Hoge.minus( 1.5, 2.0 ), -0.5, '1.5 - 2.0' );
	equal( Hoge.minus( 2, 2 ), 0, '2 - 2' );
});

module('Hogeクラスの非同期的なメソッドをテストする');

asyncTest('加算関連', function() {
	Hoge.asyncPlus( 1, 2, function(ret) {
		start();
		equal( ret, 3, '1 + 2' );
	} );
	Hoge.asyncPlus( 1.5, 10, function(ret) {
		start();
		equal( ret, 11.5, '1.5 + 10' );
	} );
	Hoge.asyncPlus( 2, 2, function(ret) {
		start();
		equal( ret, 5, '2 + 2（期待値が間違っているケース）' );
	} );
	Hoge.asyncPlus( 2, 2, function(ret) {
		start();
		equal( ret, 4, '2 + 2' );
	} );
});

asyncTest('減算関連', function() {
	Hoge.asyncMinus( 2, 1, function(ret) {
		start();
		equal( ret, 1, '2 - 1' );
	} );
	Hoge.asyncMinus( 1, 2, function(ret) {
		start();
		equal( ret, -1, '1 - 2' );
	} );
	Hoge.asyncMinus( 1.5, 2.0, function(ret) {
		start();
		equal( ret, -0.5, '1.5 - 2.0' );
	} );
	Hoge.asyncMinus( 2, 2, function(ret) {
		start();
		equal( ret, 0, '2 - 2' );
	} );
});
