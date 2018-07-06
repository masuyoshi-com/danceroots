<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecommendMusicsFixture
 *
 */
class RecommendMusicsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '自動採番ID', 'autoIncrement' => true, 'precision' => null],
        'artist_name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アーティスト名', 'precision' => null, 'fixed' => null],
        'collection_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アルバム名', 'precision' => null, 'fixed' => null],
        'track_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'トラック名', 'precision' => null, 'fixed' => null],
        'collection_artist_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アルバムアーティスト名', 'precision' => null, 'fixed' => null],
        'artist_view_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アーティストURL', 'precision' => null, 'fixed' => null],
        'collection_view_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アルバムURL', 'precision' => null, 'fixed' => null],
        'track_view_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'トラックURL', 'precision' => null, 'fixed' => null],
        'preview_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'プレビューURL', 'precision' => null, 'fixed' => null],
        'artwork_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'アートワークURL', 'precision' => null, 'fixed' => null],
        'collection_price' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'アルバム金額'],
        'track_price' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'トラック金額'],
        'release_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'リリース日', 'precision' => null],
        'track_explicitness' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '表現規制', 'precision' => null, 'fixed' => null],
        'country' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '国', 'precision' => null, 'fixed' => null],
        'currency' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '円', 'precision' => null, 'fixed' => null],
        'primary_genre_name' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'ジャンル', 'precision' => null, 'fixed' => null],
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
                'artist_name' => 'Lorem ipsum dolor sit amet',
                'collection_name' => 'Lorem ipsum dolor sit amet',
                'track_name' => 'Lorem ipsum dolor sit amet',
                'collection_artist_name' => 'Lorem ipsum dolor sit amet',
                'artist_view_url' => 'Lorem ipsum dolor sit amet',
                'collection_view_url' => 'Lorem ipsum dolor sit amet',
                'track_view_url' => 'Lorem ipsum dolor sit amet',
                'preview_url' => 'Lorem ipsum dolor sit amet',
                'artwork_url' => 'Lorem ipsum dolor sit amet',
                'collection_price' => 1,
                'track_price' => 1,
                'release_date' => '2018-07-06 14:46:27',
                'track_explicitness' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lorem ipsum dolor sit amet',
                'currency' => 'Lorem ipsum dolor sit amet',
                'primary_genre_name' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-07-06 14:46:27',
                'modified' => '2018-07-06 14:46:27'
            ],
        ];
        parent::init();
    }
}
