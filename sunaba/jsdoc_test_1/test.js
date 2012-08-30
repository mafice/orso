/**
 * @class JsDocのテスト用クラス
 */
var Test = function ( param_1, param_2 ) {
	return this;
};

/**
 * Testクラスのインスタンスを返す
 * @param param_1
 * @param param_2
 * @param param_3
 * @returns {Test}
 */
function test_01( param_1, param_2, param_3 ) {
	return new Test();
}

/**
 * Testクラスのインスタンスを返す
 * @param param_a
 * @param param_b
 * @param param_c
 */
var test_02 = function( param_a, param_b, param_c ) {
	return new Test();
};
