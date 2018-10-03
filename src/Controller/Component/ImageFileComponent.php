<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ImageFileComponent extends Component
{
    /**
     * 削除選択されていればファイル削除
     *
     * @param array  $data $this->request->data
     * @param string $table_name テーブル名 単数形
     * @param int    $count データカウント数
     * @return void
     */
    public function isSelectedDelete($data, $table_name, $count)
    {
        for ($i = 1; $i <= $count; $i++) {
            if ($data['delete_img' . $i] !== '0') {
                // FileAPIインスタンス作成
                $dir = new Folder('upload/' . $table_name);
                // 最後のスラッシュから後のファイル名を取得
                $filename = strrchr($data['delete_img' . $i], '/');
                $filename = substr($filename, 1);
                $file     = new File($dir->pwd() . DS . $filename);
                $file->delete();
                $file->close();
            }
        }
    }
}
