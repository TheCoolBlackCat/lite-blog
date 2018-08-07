<?php
function randomHexDigit () {
  $chars = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");
  return $chars[rand(0, count($chars)-1)];
}

function randomHex ($digits) {
  $str = "";
  for ($i = 0; $i < $digits; $i++)
    $str .= randomHexDigit();
  return $str;
}

?>