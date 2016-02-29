<script>
var app = angular.module('user', []);
app.controller('userAdd', function($scope)
{
	var password1 = "";
	var password2 = "";
    var password = $scope.password = "{$expert.userpassword}";

    $scope.changePassword1 = function(value){
    	 password1 = value;
   }

   $scope.changePassword2 = function(value){
   		if (value == password1) {
   			$scope.different = 0;
   		}
   		if(value !== password1){
   			$scope.different = 1;
   		}
   }
});

</script>