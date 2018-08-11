<?php

if (!function_exists('encrypt_decrypt')) {
  function encrypt_decrypt($string, $action = 'e') {
    $secret_key = 'u$l*Gk4U7xR*7$6mhZWJHhlsRMd4D26A';
    $secret_iv = '7hL818jczBok&oCi';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($action == 'e') {
      $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } elseif ($action == 'd') {
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
  }
}
