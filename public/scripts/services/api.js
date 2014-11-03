/**
 * Created by Umayr on 11/3/2014.
 */
;
(function () {
    'use strict';

    angular.module('adify')
        .factory('api', api);

    function api($http, BASE_URL) {
        var get = function (url) {
            return $http.get(url);
        };
        var post = function (url, data) {
            return $http.post(url, data);
        }

        return {
            Ad: {
                getAll: function () {
                    return get(BASE_URL + 'ad/all/');
                },
                getSizes: function () {
                    return get(BASE_URL + 'ad/available-sizes/');
                },
                createAd: function (data) {
                    return post(BASE_URL + 'ad/create/', data);
                }
            }
        }
    }

})();