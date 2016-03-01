<script>
var app=angular.module('cycle',[]);
  app.controller('cycleAdd',function($scope){
    
    $scope.name = '{:$cycle['name']}';
    $scope.starttime ='{:$cycle['starttime']}';
      $scope.endtime ='{:$cycle['endtime']}';
    
  });
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  </script>