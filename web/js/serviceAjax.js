/**
 * Created by Fabrice on 29/02/2016.
 */

angular.module('expAppCours')
    .factory('serviceAjax', function($http){
       return {
         test: function(){
             return $http.get("http://localhost:8000/user/test");
         }
       };
    });
