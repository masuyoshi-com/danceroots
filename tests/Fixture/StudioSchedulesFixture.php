<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudioSchedulesFixture
 *
 */
class StudioSchedulesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '自動採番ID', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ユーザーID', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'インストラクター名', 'precision' => null, 'fixed' => null],
        'genre' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ジャンル', 'precision' => null, 'fixed' => null],
        'week' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '曜日 0:日', 'precision' => null, 'autoIncrement' => null],
        'start' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '開始時間', 'precision' => null, 'fixed' => null],
        'end' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '終了時間', 'precision' => null, 'fixed' => null],
        'image' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'インストラクター画像', 'precision' => null, 'fixed' => null],
        'youtube' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'youtube動画', 'precision' => null, 'fixed' => null],
        'profile' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'dancerootsプロフィールURL', 'precision' => null, 'fixed' => null],
        'comment' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'コメント', 'precision' => null, 'fixed' => null],
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
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'genre' => 'Lorem ipsum dolor ',
                'week' => 1,
                'start' => 'Lorem ipsum dolor sit amet',
                'end' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'youtube' => 'Lorem ipsum dolor sit amet',
                'profile' => 'Lorem ipsum dolor sit amet',
                'comment' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-08-07 11:31:21',
                'modified' => '2018-08-07 11:31:21'
            ],
        ];
        parent::init();
    }
}
