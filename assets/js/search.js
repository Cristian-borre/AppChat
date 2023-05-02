$(document).ready(function(){
    $("#searchtext").on('input', function(){
        var searchtxt = $(this).val();
        if(searchtxt === '') return;
        $.post('../controller/SearchController.php',
                {
                    key: searchtxt
                },
                function(data, status){
                    $("#chatlist").html(data)
                })
    })
    $("#searchbtn").on('click', function(){
        var searchtxt = $("#searchtext").val();
        if(searchtxt === '')
        $.post('../controller/SearchController.php',
                {
                    key: searchtxt
                },
                function(data, status){
                    $("#chatlist").html(data)
                })
    })
})