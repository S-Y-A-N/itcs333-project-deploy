<?php

// Write all validation functions here

namespace Core;

class Validator {
  public static function email($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function uobEmail($value) {

    // validate it is an email
    if (Validator::email($value)) {

      // validate that it is uob email
      $pattern = '/(^\w*@stu\.uob\.edu\.bh$)|(^\w*@uob\.edu\.bh$)/';

      return preg_match($pattern, $value) ? true : false;
    }

    return false;

  }

  public static function password($value) {
    // TODO -- Validate password to meet requirements

  }
}