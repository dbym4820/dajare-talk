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


echo $mec->parse($call)[0]["string"];