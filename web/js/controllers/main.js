/**
 * Created by Fabrice on 03/03/2016.
 */

'use strict';

angular.module('expAppCours')
    .controller('mainCtrl', function($scope, serviceAjax){
        $scope.mess = 'Bienvenue à Angular';

        $scope.test = function(){
            serviceAjax.test().success(function(data){
                $scope.mess =data.result;
            });
        };

        // $scope.test();
    });
