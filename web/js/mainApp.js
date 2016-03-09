'use strict';

// Declare app level module which depends on views, and components
angular.module('expAppCours', [
        'ngRoute', 'countrySelect',
        'timezoneSelect'
    ])
    .config(function($routeProvider) {
        $routeProvider
            .when('/',{
                templateUrl: 'views/default.html',
                controller: 'DefaultCtrl',
                constrollerAs: 'default'
            })
            .when('/profil',{
                templateUrl: 'views/profil.html',
                controller: 'ProfilCtrl',
                constrollerAs: 'profil'
            })
            .otherwise({
                redirectTo: '/'
            });

    });


