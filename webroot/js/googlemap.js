/*jslint browser :true, continue : true,
  devel  : true, indent : 4, maxerr      : 50,
  newcap : true, nomen  : true, plusplus : true,
  regexp : true, sloppy : true, vars     : true,
  white  : true
*/
/* global jQuery */
var initGoogle = (function( $ ) {

    'use strict';

    var initMap = function (address) {
        var geocoder = new google.maps.Geocoder();
        // 住所から座標を取得する
        geocoder.geocode(
            {
                'address': address,
                'region': 'jp'
            },
            function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    google.maps.event.addDomListener(window, 'load', function () {
                        var map_tag = document.getElementById('map');
                        // 取得した座標をセット緯度経度をセット
                        var map_location = new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
                        // マップ表示のオプション
                        var map_options =
                        {
                            zoom: 15,
                            center: map_location,   // 地図の中心座標
                            disableDefaultUI: true, // ここをfalseにすると地図上に人みたいなアイコンとか表示される
                            mapTypeId: google.maps.MapTypeId.ROADMAP // 地図の種類を指定
                        };

                        // マップを表示する
                        var map = new google.maps.Map(map_tag, map_options);

                        // 地図上にマーカーを表示させる
                        var marker = new google.maps.Marker({
                            position: map_location, // マーカーを表示させる座標
                            map: map                // マーカーを表示させる地図
                        });
                    });
                }
            }
        );
    }

    return {
        initMap : initMap
    }

}( jQuery ));
