<script type="text/javascript">
    var app = angular.module('ReviewDetail', []);
    app.controller('index', function($scope) {
        $scope.reviews = {:$M->getReviewsJson()};   //评阅详情
        $scope.score = 0;
        $scope.reviewDetailOther = {:json_encode($M->getReviewsDetailOther())};             //评阅其它详情
        
        //获取总分
        var getScore = function()
        {
            $scope.score = 0;
            $scope.reviews.forEach(function(review, index){
                $scope.score += review.score * review.proportion/100;
            });
        }

        getScore();
        //单一分值改变时，更新总分。
        $scope.changeScore = function(review){
            getScore();
        };
    });
</script>