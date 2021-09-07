 $( document ).ready(function() {
    $(".delete").click(function(){
        if (window.confirm("Удалить запись?")) {
            window.location.replace('/crud/'+$(this).attr("data-EntityName")+'/'+$(this).attr("data-itemId")+'/delete');

        }
    });
});
