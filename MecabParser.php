<?php
require_once('Kana2Romaji.php');

class MecabParser {

  /* Construction */
  function __construct() {
    mb_internal_encoding('utf-8');
    header("Content-type: text/html;charset=utf8");

  }

  public function parse($text) {
    $kana2romaji = new Kana2Romaji;

    //$input = "俺の妹がこんなに可愛いわけがない，の映画を見に行きました";

    /* シェルでめかぶを実行 */
    exec('echo '.$text.' | /usr/local/bin/mecab -d /usr/local/lib/mecab/dic/mecab-ipadic-neologd', $out);

    /* 分かち書きを配列に保存
       $wakatied = [ 分かち書きされた文字列 , [ ○○詞, ○○詞, ○○詞, 人名, ..., 分かち書きされた文字列のカナ]] */
    $wakatied = array();
    for($i = 0; $i<count($out)-1; $i++){
      $tmp_wakatied = preg_split("/[\s ]+/", $out[$i]);
      $wakatied[$i] = array($tmp_wakatied[0],
			    preg_split("/[\s,]+/", $tmp_wakatied[1]));
    }

    /* カナからローマ字に変換 
       $wakati_kana = [ 分かち書きされた文字列, ローマ字表記 ] */
    $wakati_kana = array();
    
    for($i = 0; $i<count($out)-1; $i++){
      $attr_num = count($wakatied[$i][1]);
      $wakati_kana[$i] = array("string" => $wakatied[$i][0],
			       "romaji" => $kana2romaji->convert($wakatied[$i][1][$attr_num-1]));
    }
    return $wakati_kana;
  }

  function wordsCount($text) {
    return count($this->parse($text));
  }
}


