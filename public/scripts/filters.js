/**
 * Created by Umayr on 11/3/2014.
 */
;
(function () {
    'use strict';

    var app = angular.module('adify');

    app.filter('size', function () {
        return function (input) {
            return input.height + 'x' + input.width;
        }
    });

    app.filter('dateFormatting', function () {
        return function (input) {
            return moment(input).utc().format('MMMM Do YYYY, h:mm:ss a');
        }
    });
})();