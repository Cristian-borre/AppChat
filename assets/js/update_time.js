$(document).ready(function(){
    let lastseen = function(){
        $.get('../controller/UpdateTimeController.php');
    }
    lastseen();
    setInterval(lastseen,1000)
})
