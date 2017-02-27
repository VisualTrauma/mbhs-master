<?php use Carbon\Carbon; ?>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="/css/app.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <div class="wrap hidden">
    <div class="loading">
        <div class="bounceball"></div>
        <div class="text"><span id="text"></span> Students Enrolled</div>
        <form action="/summary" method="get" class="hidden"></form>
    </div>
</div>



<script>
 $.ajax({
        url: '/enroll',
        type: 'get',
        success: function(response, textStatus, jqXHR) {
           $('.hidden').submit();
        },
        error: function(jqXHR, textStatus, errorThrown){
            
        }
    });
var date = '{{ Carbon::now()->toDateString() }}';
setInterval(function() {
    $.ajax({
                url: '/checkinserted/' + date,
                type: 'get',
                success: function(response, textStatus, jqXHR) {
                    $( "#text" ).html( response );
                },
                error: function(jqXHR, textStatus, errorThrown){
                }
            });
}, 5000);
</script>

</body>
</html>