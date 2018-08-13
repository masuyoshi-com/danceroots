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


    /**
     * URL内にYoutube文字列があるか
     *
     * @param string $value
     * @return bool
     * @todo 下記3つのメソッドが重複。カスタムバリデート使用時に複数引数指定の仕方を調べる
     */
     public static function isYoutube($value)
     {
         if (strpos($value, 'youtube') !== false) {
             return true;
         } else {
             return false;
         }
     }


     /**
      * URL内にFacebook文字列があるか
      *
      * @param string $value
      * @return bool
      */
     public static function isFacebook($value)
     {
         if (strpos($value, 'facebook') !== false) {
             return true;
         } else {
             return false;
         }
     }


     /**
      * URL内にTwitter文字列があるか
      *
      * @param string $value
      * @return bool
      */
     public static function isTwitter($value)
     {
         if (strpos($value, 'twitter') !== false) {
             return true;
         } else {
             return false;
         }
     }


     /**
      * URL内にInstagram文字列があるか
      *
      * @param string $value
      * @return bool
      */
     public static function isInstagram($value)
     {
         if (strpos($value, 'instagram') !== false) {
             return true;
         } else {
             return false;
         }
     }


     /**
      * URL内にDanceroots文字列があるか
      *
      * @param string $value
      * @return bool
      */
      public static function isDanceroots($value)
      {
          if (strpos($value, 'danceroots') !== false) {
              return true;
          } else {
              return false;
          }
      }
}
