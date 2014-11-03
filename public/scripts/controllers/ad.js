/**
 * Created by Umayr on 11/3/2014.
 */
;
(function () {
    'use strict';
    angular.module('adify')
        .controller('Ad', controller);

    function controller($scope, api) {
        $scope.ads = [];
        $scope.sizes = [];
        $scope.forms = {
            create: {}
        };

        var _loadAds = function () {
            api.Ad.getAll().then(function (response) {
                $scope.ads = response.data;
            });
        };

        var _loadSizes = function () {
            api.Ad.getSizes().then(function (response) {
                var array = response.data;
                for (var i = 0; i < array.length; i++) {
                    $scope.sizes.push(array[i].height + 'x' + array[i].width);
                }
            });
        };

        var _init = function () {
            _loadAds();
            _loadSizes();
        };

        $scope.createAd = function () {
            api.Ad.createAd($scope.forms.create).then(function (response) {
                if (response.data.result === 'success') {
                    $scope.close();
                    _loadAds();
                } else {
                    // TODO: Show some error.
                }
            });
        };

        _init();
    };
})()
