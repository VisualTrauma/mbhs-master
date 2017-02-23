<script>
$(document).ready(function() {
// create the notification
    var notification = new NotificationFx({
        message : '<strong class="text-danger" style="font-size: 15px;">An error has occured. <br>Please Check Highlighted Fields</strong>',
        layout : 'growl',
        effect : 'jelly',
        type : 'notice', // notice, warning, error or success
        onClose : function() {
            bttn.disabled = false;
        }
    });

    // show the notification
    notification.show();

});
</script>