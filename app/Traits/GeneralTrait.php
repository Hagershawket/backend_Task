<?php

namespace App\Traits;
use App\Models\Notification;

trait GeneralTrait
{

    public function returnError($msg)
    {
        return response()->json([
            'status' => false,
            'msg'    => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "OK")
    {
        return [
            'status' => true,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value)
    {
        return response()->json([
            'status' => true,
            $key     => $value
        ]);
    }


    //////////////////
    public function returnValidationError($code = "E001", $validator)
    {
        return $this->returnError($code, $validator->errors()->first());
    }


    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    public function getErrorCode($input)
    {
       if ($input == "name")
           return 'E001';
       else if ($input == "email")
       return 'E002';

      else if ($input == "phone")
            return 'E003';

      else if ($input == "password")
            return 'E004';

      else
            return "";
    }



}
