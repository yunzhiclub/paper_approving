<script>
angular.module("personalCenter", []).controller("edit",function($scope){
	$scope.email = "{$user['email']}";
	$scope.phonenumber = "{$user.phonenumber}";
	$scope.regex = "^0?(13[0-9]|15[012356789]|18[0236789]|14[57]|17[7])[0-9]{8}$";
})
</script>