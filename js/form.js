// ============= FORM SESSION LOADER =============
$("form").click(function() {
    $.ajax({
        url: "session_loader.php",
        success: function(data) {
            console.log("session", data)
        }
    })
})

