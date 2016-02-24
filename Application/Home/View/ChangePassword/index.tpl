<extend name="Base:index" />
<block name="wrapper">
<div class="col-sm-offset-2">
	<form class="form-horizontal">
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">用户名：</label>
    <div class="col-sm-3">
      qazwsx
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">专家姓名：</label>
    <div class="col-sm-3">
      李明
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">原密码：</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputEmail3" placeholder="oldPassword">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">新密码：</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputPassword3" placeholder="newPassword">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">确认密码：</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputPassword3" placeholder="newPassword">
    </div>
  </div>

  <div class="form-group">
    <label for="title" class="col-sm-3 control-label">技术职称：</label>
    <div class="col-sm-3">
      <form>
        <input type="radio" name="senior" value="senior" />正高级
        <input type="radio" name="senior" value="sub-senior" />副高级
      </form>
    </div>
  </div>

  <div class="form-group">
    <label for="types" class="col-sm-3 control-label">导师类别：</label>
      <div class="col-sm-3">
        <form>
          <input type="radio" name="tutor" value="doctor tutor" />博导
          <input type="radio" name="tutor" value="master tutor" />硕导
        </form>
      </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
      <button type="submit" class="btn btn-default">保存</button>
    </div>
  </div>

</form>
</div>
</block>
</extend>