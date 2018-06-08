<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudiosFixture
 *
 */
class StudiosFixture extends TestFixture
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
        'studio_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'スタジオ名', 'precision' => null, 'fixed' => null],
        'icon' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アイコン', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '代表者名', 'precision' => null, 'fixed' => null],
        'tel' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '電話番号', 'precision' => null, 'fixed' => null],
        'self_intro' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '自己紹介', 'precision' => null, 'fixed' => null],
        'pref' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '都道府県', 'precision' => null, 'fixed' => null],
        'address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '以下住所', 'precision' => null, 'fixed' => null],
        'station' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '最寄り駅', 'precision' => null, 'fixed' => null],
        'url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ホームページ', 'precision' => null, 'fixed' => null],
        'establishment_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '設立日', 'precision' => null],
        'bussines_hours' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '営業時間', 'precision' => null, 'fixed' => null],
        'entry_fee' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '入会費', 'precision' => null, 'fixed' => null],
        'monthly_tax' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'レッスン料形態', 'precision' => null, 'fixed' => null],
        'ex_lesson' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '体験レッスン', 'precision' => null],
        'instructors' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'インストラクター数', 'precision' => null, 'autoIncrement' => null],
        'youtube' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'スタジオ動画', 'precision' => null, 'fixed' => null],
        'facebook' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Facebook', 'precision' => null, 'fixed' => null],
        'twitter' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Twitter', 'precision' => null, 'fixed' => null],
        'instagram' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Instagram', 'precision' => null, 'fixed' => null],
        'image1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イメージ①', 'precision' => null, 'fixed' => null],
        'image2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イメージ②', 'precision' => null, 'fixed' => null],
        'image3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'イメージ③', 'precision' => null, 'fixed' => null],
        'introduction' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'スタジオ紹介', 'precision' => null],
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
            'studio_name' => 'Lorem ipsum dolor sit amet',
            'icon' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'tel' => 'Lorem ipsum dolor sit amet',
            'self_intro' => 'Lorem ipsum dolor sit amet',
            'pref' => 'Lorem ipsum dolor sit amet',
            'address' => 'Lorem ipsum dolor sit amet',
            'station' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'establishment_date' => '2018-04-11',
            'bussines_hours' => 'Lorem ipsum dolor sit amet',
            'entry_fee' => 'Lorem ipsum dolor sit amet',
            'monthly_tax' => 'Lorem ipsum dolor sit amet',
            'ex_lesson' => 1,
            'instructors' => 1,
            'youtube' => 'Lorem ipsum dolor sit amet',
            'facebook' => 'Lorem ipsum dolor sit amet',
            'twitter' => 'Lorem ipsum dolor sit amet',
            'instagram' => 'Lorem ipsum dolor sit amet',
            'image1' => 'Lorem ipsum dolor sit amet',
            'image2' => 'Lorem ipsum dolor sit amet',
            'image3' => 'Lorem ipsum dolor sit amet',
            'introduction' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2018-04-11 08:53:10',
            'modified' => '2018-04-11 08:53:10'
        ],
    ];
}
