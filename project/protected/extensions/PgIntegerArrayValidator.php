<?php

/**
 * @class PgIntegerArrayValidato
 * @version 1.0.0 от 07-11-201
 * @update 07-11-201 sergl
 * Валидатор для проверки атрибута на соответсвие массиву с целочисленными данными
 */
namespace app\extensions;
class PgIntegerArrayValidator extends CValidator
{
    /*
     * Валидация
     */
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