/**
 * Created by Umayr on 11/4/2014.
 */
;
(function () {
    'use strict';

    var app = angular.module('adify');

    app.directive('bsModal', function(){
        return{
            restrict : 'A',
            link : function (scope, element) {
                scope.close = function () {
                    $(element).modal('hide');
                };
            }
        }
    });
})();