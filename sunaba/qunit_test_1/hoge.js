/**
 * @class Hoge クラス
 */
var Hoge = {
		/**
		 * 加算
		 */
		plus: function( a, b ) {
			return a + b;
		},
		
		/**
		 * 減算
		 */
		minus: function( a, b ) {
			return a - b;
		},
		
		/**
		 * 非同期な加算
		 * callback関数の引数として結果が返る
		 */
		asyncPlus: function( a, b, callback ) {
			setTimeout( function() {
				callback( a + b );
			}, 500 );
		},
		
		/**
		 * 非同期な減算
		 * callback関数の引数として結果が返る
		 */
		asyncMinus: function( a, b, callback ) {
			setTimeout( function() {
				callback( a - b );
			}, 500 );
		} 
};

