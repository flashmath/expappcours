/**
 * Created by Fabrice on 03/03/2016.
 */
angular.module('expAppCours')
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