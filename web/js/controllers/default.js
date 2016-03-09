/**
 * Created by Fabrice on 04/03/2016.
 */

'use strict';

angular.module('expAppCours')
    .controller('DefaultCtrl', function($scope){
        $scope.mess = 'Bienvenue sur le système';

        $scope.user = {
            "name": "Charlemagne",
            "firstname": "Fabrice",
            "email1": "flash_math@yahoo.fr",
            "email1_confirmed" : true,
            "state": '0',
            "availableState": [
                {id: '0', name:'En ligne'},
                {id: '1', name:'Ne pas déranger'},
                {id: '2', name:'Hors ligne'}
            ]
        }

    }

);