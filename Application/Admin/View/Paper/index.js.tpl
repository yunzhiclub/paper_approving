<script type="text/javascript">
    var callBack = function(file, data, response){
        console.log(data);
        $.get(
            "{:U('matchAjax')}",
            {id:data.id, name:data.name},
            function(data){
                console.log(data);
            }
            );
    }  
    $(function(){
         $('[data-toggle="popover"]').popover();
    });  
</script>