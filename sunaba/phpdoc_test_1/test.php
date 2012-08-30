<?
/**
 * ここは Page-level DocBlock です（From: http://caspar.hazymoon.jp/php/phpDocumentor/）
 *
 * Page-level DocBlockはこのファイルについての説明など
 * を書くのでしょう。
 *
 * 詳しくは{@link http://manual.phpdoc.org/HTMLframesConverter/earthli/ phpDocumentorマニュアル}
 * を見ましょう。
 *
 * @category   DocBlock サンプルファイル
 * @package    phpDocumentor
 * @author     me <foo@bar>
 * @copyright  Foo 株式会社
 * @license    Foo 株式会社 License Ver. 3.0
 * @version    1.0
 * @link       http://manual.phpdoc.org/HTMLframesConverter/earthli/ phpDocumentorマニュアル
 * @access     public
 */

/**
 * ここは inlcude DocBlock です。
 *
 * inlcude ファイルの説明など書きます。
 */
require_once("inc.php");

/**
 * ここは global variable DocBlock です。
 *
 * global variableの説明など書きます。
 *
 * @name $baz
 * @global array $GLOBALS['baz'] 
 */
$GLOBALS['baz'] = array('foo','bar');

/**
 * ここは define DocBlock です。
 *
 * defineの説明など書きます。
 *
 * @var int 1+2の結果
 */
define('THREE', 1+2);

/**
 * ここは function DocBlock です。
 *
 * 関数の説明など書きます。
 * ソースの表示も
 * {@source }
 * 出来るぞ
 *
 * @global array used for stuff
 * @staticvar array $bar_val
 * @param bool $arg1 関数の引数
 * @return void
 * @access public
 */
function mine($arg1) {
    global $baz;
    static $bar_val = array();
}

/**
 * ここは class DocBlock です。
 *
 * classの説明など書きます。
 *
 * @category   DocBlock サンプル foo Class
 * @package    phpDocumentor
 * @author     me <foo@bar>
 * @copyright  Foo 株式会社
 * @license    Foo 株式会社 License Ver. 3.0
 * @version    1.10
 * @see        child1::bar()
 * @access     public
 * @abstract
 */
class foo{
    /**
     * ここは variable DocBlock です。
     *
     * 変数の説明など書きます。
     *
     * @var string 変数内容
     */
    var who;
   
    /**
     * ここは method DocBlock です。
     *
     * methodの説明など書きます。
     * ソースの表示も
     * {@source }
     * 出来るぞ
     *
     * @param  void
     * @return void
     * @access public
     */
    function bar(){ }
}

/**
 *ここは class DocBlock です。(fooのchild Classになっています)
 *
 * classの説明など書きます。
 *
 * @category   DocBlock サンプル child1 Class
 * @package    phpDocumentor
 * @author     me <foo@bar>
 * @version    1.7
 * @see        foo
 * @access     public
 */
class child1 extends foo{ }

?>