<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecommendMusic Entity
 *
 * @property int    $id
 * @property string $artist_name
 * @property string $collection_name
 * @property string $track_name
 * @property string $collection_artist_name
 * @property string $artist_view_url
 * @property string $collection_view_url
 * @property string $track_view_url
 * @property string $preview_url
 * @property string $artwork_url
 * @property float $collection_price
 * @property float $track_price
 * @property \Cake\I18n\FrozenTime $release_date
 * @property string $track_explicitness
 * @property string $country
 * @property string $currency
 * @property string $primary_genre_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class RecommendMusic extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        'artist_name'            => true,
        'collection_name'        => true,
        'track_name'             => true,
        'collection_artist_name' => true,
        'artist_view_url'        => true,
        'collection_view_url'    => true,
        'track_view_url'         => true,
        'preview_url'            => true,
        'artwork_url'            => true,
        'collection_price'       => true,
        'track_price'            => true,
        'release_date'           => true,
        'track_explicitness'     => true,
        'country'                => true,
        'currency'               => true,
        'primary_genre_name'     => true,
        'created'                => true,
        'modified'               => true
    ];
}
