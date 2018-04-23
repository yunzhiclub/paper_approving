<script type="text/javascript">
    var callBack = function(file, data, response){
        console.log(data);
        $.get(
            "{:U('matchAjax')}",
            {id:data.id, name:data.name},
            function(data){
                data = JSON.parse(data);
                console.log(data);
                if (data.status == 'ERROR')
                {
                    alert("发生错误:"+data.message);
                }
            }
            );
    }  
    $(function(){
         $('[data-toggle="popover"]').popover();
    });  
</script>