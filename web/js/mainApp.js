/**
 * Created by Fabrice on 29/02/2016.
 */

'use strict';

var app = angular.module('expAppCours',['ngRoute'])
    .config( function ($routeProvider){
       $routeProvider
           .when('/profil',{
               templateUrl: 'views/profil.html',
               controller: 'ProfilCtrl',
               controllerAs: 'profil'
           });
    });


