<?php

/**
 * @name PgIntegerArrayBehavior
 * @version 1.0.0 от 07-11-2016
 * @update 07-11-201 sergl
 *  Поведение обработки массивов целочисленных значений вида int[]
 *  Подключение какждого элемента отдельно
 *  Изменяет типы данных в модели
 *
 */

namespace app\components;
class PgIntegerArrayBehavior  extends CActiveRecordBehavior {
  public $attribute;
    /*
     * Конвертер со строки в массив
     */
    private function convertToArray($str = ''){
        $result = explode(',',substr($str,1,strlen($str)-2));
        return $result;
    }
    /*
     * Конвертер с массива в строку
     *
     */

    private function convertToString($arr = array()){
        $result = '{'. implode(',', $arr) . '}';
        return $result;
    }

    /*
     * Преобразование аттрибута при получении
     */

    public function afterFind($attribute)
    {
        parent::afterFind();
        $this->owner->attribute = $this->convertToArray($this->owner->attribute);
    }

    /*
     * Преобразование аттрибута при сохранении
     */
    public function beforeSave($attribute)
    {
        parent::beforeSave();
        $this->owner->attribute = $this->convertToString($this->owner->attribute);
    }
}