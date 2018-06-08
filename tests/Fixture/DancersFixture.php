<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DancersFixture
 *
 */
class DancersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '自動採番ID', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'ユーザーID', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンサー名', 'precision' => null, 'fixed' => null],
        'team_name' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンスチーム名', 'precision' => null, 'fixed' => null],
        'age' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '年齢', 'precision' => null, 'autoIncrement' => null],
        'icon' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アイコン', 'precision' => null, 'fixed' => null],
        'genre' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ジャンル', 'precision' => null, 'fixed' => null],
        'pref' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '都道府県', 'precision' => null, 'fixed' => null],
        'self_intro' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '自己紹介文', 'precision' => null, 'fixed' => null],
        'career' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'ダンス年数', 'precision' => null, 'autoIncrement' => null],
        'image1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンス画像①', 'precision' => null, 'fixed' => null],
        'image2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンス画像②', 'precision' => null, 'fixed' => null],
        'image3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンス画像③', 'precision' => null, 'fixed' => null],
        'image4' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '画像④', 'precision' => null, 'fixed' => null],
        'image5' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '画像⑤', 'precision' => null, 'fixed' => null],
        'image6' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '画像⑥', 'precision' => null, 'fixed' => null],
        'youtube1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンス動画①', 'precision' => null, 'fixed' => null],
        'youtube2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンス動画②', 'precision' => null, 'fixed' => null],
        'youtube3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ダンス動画③', 'precision' => null, 'fixed' => null],
        'history' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '経歴', 'precision' => null],
        'practice_place' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '練習場所', 'precision' => null, 'fixed' => null],
        'favorite_brand' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '好きなブランド', 'precision' => null, 'fixed' => null],
        'url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'プロフィールサイト', 'precision' => null, 'fixed' => null],
        'twitter' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'twitter', 'precision' => null, 'fixed' => null],
        'facebook' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'facebook', 'precision' => null, 'fixed' => null],
        'instagram' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'instagram', 'precision' => null, 'fixed' => null],
        'respect_dancer' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リスペクトダンサー', 'precision' => null, 'fixed' => null],
        'favorite_artist' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '好きなアーティスト', 'precision' => null, 'fixed' => null],
        'song1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'お気に入り曲①', 'precision' => null, 'fixed' => null],
        'song2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'お気に入り曲②', 'precision' => null, 'fixed' => null],
        'song3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'お気に入り曲③', 'precision' => null, 'fixed' => null],
        'plan' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '出演予定', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '登録日', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '更新日', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'team_name' => 'Lorem ipsum dolor sit amet',
            'age' => 1,
            'icon' => 'Lorem ipsum dolor sit amet',
            'genre' => 'Lorem ipsum dolor sit amet',
            'pref' => 'Lorem ipsum dolor sit amet',
            'self_intro' => 'Lorem ipsum dolor sit amet',
            'career' => 1,
            'image1' => 'Lorem ipsum dolor sit amet',
            'image2' => 'Lorem ipsum dolor sit amet',
            'image3' => 'Lorem ipsum dolor sit amet',
            'image4' => 'Lorem ipsum dolor sit amet',
            'image5' => 'Lorem ipsum dolor sit amet',
            'image6' => 'Lorem ipsum dolor sit amet',
            'youtube1' => 'Lorem ipsum dolor sit amet',
            'youtube2' => 'Lorem ipsum dolor sit amet',
            'youtube3' => 'Lorem ipsum dolor sit amet',
            'history' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'practice_place' => 'Lorem ipsum dolor sit amet',
            'favorite_brand' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'twitter' => 'Lorem ipsum dolor sit amet',
            'facebook' => 'Lorem ipsum dolor sit amet',
            'instagram' => 'Lorem ipsum dolor sit amet',
            'respect_dancer' => 'Lorem ipsum dolor sit amet',
            'favorite_artist' => 'Lorem ipsum dolor sit amet',
            'song1' => 'Lorem ipsum dolor sit amet',
            'song2' => 'Lorem ipsum dolor sit amet',
            'song3' => 'Lorem ipsum dolor sit amet',
            'plan' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2018-03-05 15:27:15',
            'modified' => '2018-03-05 15:27:15'
        ],
    ];
}
