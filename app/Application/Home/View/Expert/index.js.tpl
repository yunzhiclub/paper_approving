<script>
var app = angular.module('user', []);
app.controller('userAdd', function($scope)
{
  $scope.expert = {:json_encode(session('expert'))};
  $scope.hasError = "";
  $scope.newpassword = "";
  $scope.repassword = "";
  $scope.submitDisable = 0;

  $scope.submit = function(){};
  $scope.$watchGroup(["newpassword","repassword"], function(){
    if ($scope.newpassword !== $scope.repassword)
    {
        $scope.hasError = "两次密码不一致";
        $scope.submitDisable  = 1;
    }
    else
    {
        $scope.hasError = "";
        $scope.submitDisable  = 0;
    }
  });
  
});
</script>