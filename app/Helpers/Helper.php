<?php

use Illuminate\Support\Facades\Validator;

    class Helper {
        public static function validate($data) {
            $validator = Validator::make($data, [ 'access_token' => 'required|date_format:Y-m-d' ]);
            if ($validator->fails()) {
                return $validator->errors();
            }
            return true;
        }
    }
?>