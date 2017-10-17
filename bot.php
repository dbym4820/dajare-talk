<?php
require_once('MecabParser.php');
require_once('Kana2Romaji.php');


// ユーザからのリクエストテキスト
$call = $_POST["call"]["value"];


mb_internal_encoding('utf-8');
header("Content-type: text/html;charset=utf8");
$mec = new MecabParser;
/* $parsed_word = $mec->parse("私が神だ"); */
/* for($i = 0; $i < count($parsed_word); $i++) { */
/*   foreach($parsed_word[$i] as $parsed_word_key => $parsed_word_value ){ */
/*     if(!($parsed_word_key == "string")){ */
/*       /\* echo $parsed_word_value; *\/ */
/*       /\* echo "<br>"; *\/ */
/*     } */
/*   } */
/* } */


//$first_word = $mec->parse($call)[0]["string"];

if(preg_match("*収入*", $call)){
  echo "あなたの総収入は○○円です．<br />稼ぎすぎではありませんか？<br />○○円以上は課税対象です．ご注意を．";
} elseif (preg_match("*どうしたら*", $call)){
  echo "手遅れです．<br />諦めてください．";
} elseif (preg_match("*わろた*", $call)){
  echo "おつかれさまです．<br />さようなら．";
} else {
  echo $call;
}