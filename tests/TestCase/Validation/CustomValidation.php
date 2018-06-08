<?php
namespace App\Model\Validation;

use Cake\Validation\Validation;

class CustomValidation extends Validation
{
    /**
     * 空白文字判定
     *
     * @param string $value
     * @return bool
     */
    public static function isSpace($value)
    {
        return (bool) preg_match('/[^\s　]/', $value);
    }
    
    /**
    * 全角ひらがなと全角ハイフンは許可。空白のみはエラー
    *
    * @param string $value
    * @return bool
    */
    public static function isKana($value)
    {
        return (bool) preg_match('/^[ーぁ-ん]+$/u', $value) && preg_match('/[^\s　]/', $value);
    }
}
