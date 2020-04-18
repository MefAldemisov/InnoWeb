// ============= FORM SESSION LOADER =============
$("form").click(function() {
    $.ajax({
        url: "session_loader.php",
        success: function(data) {
            console.log("session", data)
        }
    })
})

function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#form-img').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
      $('#form-img').removeClass("hidden-modal")
    }
  }

$("#file_selector").change( 
    function() {
        readURL(this)
    }
)
