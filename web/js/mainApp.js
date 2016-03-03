/**
 * Created by Fabrice on 29/02/2016.
 */

'use strict';

angular.module('expAppCours',[])
    .controller('mainCtrl', function($scope, serviceAjax){
        $scope.mess = 'Bienvenue à Angular';

        $scope.test = function(){
            serviceAjax.test().success(function(data){
                $scope.mess =data.result;
            });
        };

        $scope.test();
    })
    .controller('infosCtrl', function($scope, serviceAjax){

        $scope.notificationsShow = false;
        $scope.notificationsCount = 0;

        $scope.info =function(){
            serviceAjax.info().success(function(data){
                $scope.notificationsCount = data.count;
                $scope.notificationsShow = ($scope.notificationsCount!=0);
            });
        };

        $scope.info();
    });
