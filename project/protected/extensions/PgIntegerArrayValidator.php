<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 07.11.16
 * Time: 14:29
 */

namespace app\extensions;
class PgIntegerArrayValidator extends CValidator
{
    protected function validateAttribute($object,$attribute){
        $result = true;
        $checkData =$object->$attribute;
        if (!is_null($checkData) && empty($checkData) ){
            // проверка на масиив
            if(!is_array($checkData)) {
                $result = false;
            } else{
                // проверка на отсутсвие пустых данных или отсутсвие целочисленных
                foreach ($checkData as $val){
                    if (empty($val) && !is_integer($val)){
                        $result =  false;
                        exit();
                    }
                }
            }
        }
        if (!$result){
            $this->addError($object,$attribute,'Данные не являются массивом целочисленных данных');
        }


    }
}