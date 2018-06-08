<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsFixture
 *
 */
class EventsFixture extends TestFixture
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
        'event_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イベント名', 'precision' => null, 'fixed' => null],
        'intro' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イベント簡易紹介', 'precision' => null, 'fixed' => null],
        'category' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'カテゴリ', 'precision' => null, 'fixed' => null],
        'image' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イベントイメージ', 'precision' => null, 'fixed' => null],
        'youtube' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '過去イベント動画', 'precision' => null, 'fixed' => null],
        'event_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '開始日', 'precision' => null],
        'start' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '開始時刻', 'precision' => null],
        'end' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '終了時刻', 'precision' => null],
        'pref' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '都道府県', 'precision' => null, 'fixed' => null],
        'address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '場所の住所', 'precision' => null, 'fixed' => null],
        'place' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '建物名', 'precision' => null, 'fixed' => null],
        'entry' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '参加資格', 'precision' => null, 'fixed' => null],
        'recruit_flg' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '募集フラグ', 'precision' => null],
        'entry_fee' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '参加費', 'precision' => null, 'fixed' => null],
        'guest' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ゲスト', 'precision' => null],
        'event_detail' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イベント紹介', 'precision' => null],
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
            'event_name' => 'Lorem ipsum dolor sit amet',
            'intro' => 'Lorem ipsum dolor sit amet',
            'category' => 'Lorem ipsum dolor sit amet',
            'image' => 'Lorem ipsum dolor sit amet',
            'youtube' => 'Lorem ipsum dolor sit amet',
            'event_date' => '2018-04-16',
            'start' => '09:05:22',
            'end' => '09:05:22',
            'pref' => 'Lorem ipsum dolor sit amet',
            'address' => 'Lorem ipsum dolor sit amet',
            'place' => 'Lorem ipsum dolor sit amet',
            'entry' => 'Lorem ipsum dolor sit amet',
            'recruit_flg' => 1,
            'entry_fee' => 'Lorem ipsum dolor sit amet',
            'guest' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'event_detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2018-04-16 09:05:22',
            'modified' => '2018-04-16 09:05:22'
        ],
    ];
}
