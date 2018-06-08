<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ImageFileComponent extends Component
{
    // 最大アップロードファイル数
    const IMAGE_FILE_COUNT = 7;

    /**
     * 削除選択されていればファイル削除
     *
     * @param array $data $this->request->data
     * @param string $table_name テーブル名 単数形
     * @return array $data $this->request->data
     */
    public function isSelectedDelete($data, $table_name)
    {
        for ($i = 1; $i <= self::IMAGE_FILE_COUNT; $i++) {
            if (isset($data['delete_img' . $i])) {
                // FileAPIインスタンス作成
                $dir = new Folder('upload/' . $table_name);
                // 最後のスラッシュから後のファイル名を取得
                $filename = strrchr($data['delete_img' . $i], '/');
                $filename = substr($filename, 1);
                $file     = new File($dir->pwd() . DS . $filename);
                $file->delete();
                $file->close();
                $data['image_path' . $i] = NULL;
            }
        }
        return $data;
    }
}
