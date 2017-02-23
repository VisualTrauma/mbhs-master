<script>
$(document).ready(function() {
// create the notification
    var notification = new NotificationFx({
        message : '<p style="color: black; font-size: 15px;">'  + '{{ session()->pull('success') }}' + '</p>',
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