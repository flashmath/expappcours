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
        $scope.tasksCount = 0;
        $scope.tasksShow = false;
        $scope.messagesShow = false;
        $scope.messagesCount = 0;

        $scope.info =function(){
            serviceAjax.info().success(function(data){
                $scope.notificationsCount = data.count_notification;
                $scope.notificationsShow = ($scope.notificationsCount!=0);

                $scope.tasksCount = data.count_task;
                $scope.tasksShow = ($scope.tasksCount!=0);

                $scope.messagesCount = data.count_message;
                $scope.messagesShow = ($scope.messagesCount!=0);
            });
        };

        $scope.info();
    });
