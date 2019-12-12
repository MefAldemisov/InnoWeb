// ============= FORMS =============

let name_guest_1 = document.getElementById('input_name')
console.log("name guest:", name_guest_1)
let button_send_info = document.getElementById('send_present')
console.log("button:", button_send_info)

// action: onclick
button_send_info.onclick = function(){
    console.log('Info submited');
    /* printing of the form's content is
       reasonable only after 
       form submition */
     

}

