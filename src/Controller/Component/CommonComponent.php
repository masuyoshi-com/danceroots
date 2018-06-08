<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class CommonComponent extends Component
{
    /**
     * 区分によってリンク先を切り替える
     *
     * @param array $classification ユーザー区分
     * @param string $action アクション名
     * @return array コントローラ名とアクション名配列
     */
    public function linkSwitch($classification, $action, $id)
    {
        switch ($classification) {
            case 0:
                return ['controller' => 'dancers', 'action' => $action, $id];
                break;
            case 1:
                return ['controller' => 'studios', 'action' => $action, $id];
                break;
            case 2:
                return ['controller' => 'organizers', 'action' => $action, $id];
                break;
            case 3:
                return ['controller' => 'generals', 'action' => $action, $id];
            default:
                return false;
                break;
        }
    }


    /**
     * Youtube動画がPOSTデータ内にある場合、動画IDのみに変換
     *
     * @param string $youtube POSTされたYoutubeURL
     * @return string | false trueなら動画ID youtubeURLでない場合はfalse
     */
    public function getYoutubeId($youtube)
    {
        if ($youtube) {
            // URL内のv=以降の文字列を全て取得(動画ID取得)
            $youtube_id = str_replace('v=', '', strstr($youtube, 'v='));
            // キャッシュが残っている場合、URLに&t=が付与されるのに対処
            if(strpos($youtube_id, '&t=') !== false){
                    return substr($youtube_id, 0, strcspn($youtube_id, '&'));
            }
            return $youtube_id;
        }
        return '';
    }


    /**
     * ユーザ区分でカテゴリ名を返す
     *
     * @param int $classification ユーザー区分
     * @return string ユーザカテゴリ名
     */
    public function getCategoryName($classification)
    {
        switch ($classification) {
            case 0:
                return 'Dancer';
                break;
            case 1:
                return 'Studio';
                break;
            case 2:
                return 'Organizer';
                break;
            case 3:
                return 'General';
                break;
            default:
                return false;
                break;
        }
    }


    /**
    * selectbox optionで使用 valueとkeyを同じにする
    *
    * @param array $array 配列
    * @return array keyをvalueの値にした連想配列
    */
    public function valueToKey($array)
    {
        $tmps = [];
        foreach ($array as $key => $value) {
            $tmps[$value] = $value;
        }
        return $tmps;
    }


    /**
     * classificationで取得データを切り替え
     *
     * @param int $classification ユーザー区分
     * @return object | false
     */
    public function getUsersByClassification($classification, $user_id)
    {
        switch ($classification) {
            case (0) :
                $this->Dancers = TableRegistry::get('Dancers');
                return $this->Dancers->findByUserId($user_id)->first();
                break;
            case (1) :
                $this->Studios = TableRegistry::get('Studios');
                return $this->Studios->findByUserId($user_id)->first();
                break;
            case (2) :
                $this->Organizers = TableRegistry::get('Organizers');
                return $this->Organizers->findByUserId($user_id)->first();
                break;
            case (3) :
                $this->Generals = TableRegistry::get('Generals');
                return $this->Generals->findByUserId($user_id)->first();
                break;
            default :
                return false;
                break;
        }
    }


    /**
     * URL手入力禁止
     *
     * @param none
     */
    public function refeler()
    {
        if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] === null) {
            $_SESSION = [];
            SessionComponent::destroy();
            die('不正な操作があった可能性があります。申し訳ありませんが最初からやり直して</a>ください。');
        }
    }

}
