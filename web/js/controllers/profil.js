/**
 * Created by Fabrice on 04/03/2016.
 */

'use strict';

angular.module('expAppCours')
    .controller('ProfilCtrl',function($scope,$http){


            $scope.info = 'Bienvenue sur votre profil';

            $scope.panel = 'views/profilensemble.html';

            $scope.image ={}

            $scope.saveImage = function(){
                $http({
                    method : 'POST',
                    url : 'api/users/images',
                    data: $scope.image,
                    headers : {'Content-Type': 'undefined'}
                })
                    .then(function(data){
                     alert(data.data.message);
                    },function(data){
                        alert('Erreur');
                    });
            }

            $scope.user.profil= {
                "email2" : "test",
                "email2_confirmed" : true,
                "titre": '',
                "country": 'FR',
                "fuseau": 'Europe/Paris',
                "localisation": "Lycée Robert Doisneau, Corbeil-Essonnes, France",
                "availableTitre": [
                    { id: '1', name: 'M.'},
                    { id: '2', name: 'Mme'}
                ]
            };

            $scope.getPanel = function(panelSelected){
                switch (panelSelected){
                    case 'ensemble' :
                        $scope.panel = 'views/profilensemble.html';
                        break;
                    case 'parameters' :
                        $scope.panel = 'views/profilparameters.html';
                        break;
                    case 'communauty' :
                        $scope.panel = 'views/profilcommunauty.html';
                        break;
                }
            }
        }

    );