<extend name="Base:index" />
<block name="wrapper">
<div class="col-sm-offset-2">
	<form class="form-horizontal">
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-3">
      小明
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputEmail3" placeholder="oldPassword">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputPassword3" placeholder="newPassword">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputPassword3" placeholder="newPassword">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">保存</button>
    </div>
  </div>
</form>
</div>
</block>
</extend>