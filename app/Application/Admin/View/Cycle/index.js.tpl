<script type="text/javascript">
    var app=angular.module('Cycle',[]);
  app.controller('index',function($scope){
    $scope.delete = function(url){
        if (confirm("删除周期，可能会导致数据异常,请确认") == true)
        {
            window.location.href = url;
        }
    };
    });
</script>