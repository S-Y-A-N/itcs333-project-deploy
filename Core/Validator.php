<?php

// Write all validation functions here

namespace Core;

class Validator {
  public static function email($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function uob_email($value) {

    // 1- validate that it is an email
    if (Validator::email($value)) {

      // 2- validate that it is a UOB email
      $pattern = '/(^\w*@stu\.uob\.edu\.bh$)|(^\w*@uob\.edu\.bh$)/';

      return preg_match($pattern, $value) ? true : false;
    }

    return false;

  }

  public static function password_strong($value) {
    $uppercase = preg_match('/[A-Z]/', $value);
    $lowercase = preg_match('/[a-z]/', $value);
    $number    = preg_match('/[0-9]/', $value);
    $specialChar = preg_match('/[\W]/', $value);
    $length = preg_match('/\S{8,}/', $value);

    return $uppercase && $lowercase && $number && $specialChar && $length ? true : false;
  }

  public static function password_match($p1, $p2) {
    return $p1 === $p2;
  }
}