<extend name="Base:index" />
<block name="body">
  <div class="row-fluid" ng-app="cycle" ng-controller="cycleAdd">
    <div class="col-xs-12">
      <button type="button" class="btn btn-info" onclick="javascript:history.back(-1);">
        返回
      </button>
      <div class="panel-body">
      </div>
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          添加用户
        </div> -->
          <div class="panel-body">
            <form class="form-horizontal" name="form" action="{:U('save')}" method='post'>
              <input type="hidden" name="id" value="{$cycle.id}"/>

              <div class="form-group">
                <label for="cyclename" class="col-sm-2 control-label">名称</label>
                  <div class="col-sm-4">
                    <input id="cyclename" name="name" class="form-control" ng-model="name" required/>

                    <p class="text-danger" ng-show="form.cyclename.$dirty && form.cyclename.$invalid"> <span ng-show="form.cyclename.$error.required">名称不能为空</span></p>
                  </div>
              </div>

              <div class="form-group">
                <label for="starttime" class="col-sm-2 control-label">开始日期</label>
                  <div class="col-sm-4">
                    <input name="starttime" type="text" value="{$cycle['starttime']}" class="form-control date" ng-model="starttime" required/>
                  </div>
              </div>

              <div class="form-group">
                <label for="endtime" class="col-sm-2 control-label">结束日期</label>
                  <div class="col-sm-4">
                    <input name="endtime" type="text" value="{$cycle['endtime']}" class="form-control date" ng-model="endtime" required/>
                  </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-sm btn-success">
                  <i class="fa fa-check"></i>保存</button>
                </div>
              </div>
            </form>
        </div>
      </div> 
    </div>
  </div>
<script type="text/javascript">
  var app=angular.module('cycle',[]);
  app.controller('cycleAdd',function($scope){
    
    $scope.name = '{:$cycle['name']}';
    $scope.starttime ='{:$cycle['starttime']}';
      $scope.endtime ='{:$cycle['endtime']}';
    
  });

 </script>
</block>