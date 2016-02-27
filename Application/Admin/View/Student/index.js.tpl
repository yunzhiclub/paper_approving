<script type="text/javascript">
        var callBack = function(file, data, response){
            console.log(data);
            if (data.state === "SUCCESS")
            {
                var url = data.url;
                $.get("{:U('readExcelAjax')}",{url:url},function(data)
                {
                    var dataObj = JSON.parse(data);
                    $(".panel-body").append('<div class="alert alert-success">已删除'+dataObj.data.deleteCount+'条记录,成功上传'+dataObj.data.successCount+'条记录,重复记录数'+dataObj.data.repeatCount+'.请刷新网页查看最新上传数据</div>');
                });
            }
            else
            {
                alert("内部错误," + data.message);
                return;
            }
        }
    </script>