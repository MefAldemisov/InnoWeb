const SYPEX_URL = "https://api.sypexgeo.net/json/"
const CITIES_URL = "http://glavpunkt.ru/api/get_rf_cities"
const error_p = "<p class='form__error-msg'> Поле обязательно к заполнению </p>"
let cities
let DEL_PRICE // delivery price (the same for all tickets)

function countSessions() {
    $.ajax({
        url: 'session_count.php',
        success: function (data) {
            console.log("visits", data)
        }
    })
}


function searchTarif(city) {
    const url = `https://glavpunkt.ru/api/get_tarif?serv=выдача&cityFrom=Санкт-Петербург&cityTo=${city}&weight=0.1&price=500&paymentType=prepaid`

    getRequest(url, function () {
        const result = (this)
        if (result["result"] === "ok") {
            DEL_PRICE = result["tarif"]
        }
    })
}

function locationModalOpen() {
    if (!cities) {
        getRequest(CITIES_URL, function () {
            cities = (this)
        })
    }
    $("#city-modal").toggleClass("hidden-modal")
}

function getRequest(api_url, callback, errorHandler = null) {

    const xhr = $.getJSON(api_url, function (data, status, xhr) {

        if (status === 'success') {
            if (xhr.readyState === 4 && xhr.status === 200) {
                callback.call(data)
            }
        } else if (status === 'error') {
            errorHandler()
        }
    })
}

function formSendSuccess(msg) {

    console.log("SUCCESS <" + msg + ">")
    // $.parseJSON() 
    msg = JSON.parse(msg)
    switch (msg.status) {
        case 2:
            const error_keys = Object.keys(msg)
            for (input_name of error_keys) {
                if (input_name != "status") {
                    $("input[name=" + input_name + "]").after(error_p)
                }
            }
            break
        case 1:
            alert("Не получилось отправить заявку :( \nПопробуйте отправить форму ещё раз")
            break
        case 0:
            // close form
            alert("Ваша заявка успешно отправлена")
            const container = $("#order-form__container")
            container.css("display", "none")
            container.html(`<div style="padding:1rem">
                        <p>Ваша заявка успешно отправлена</p><br>
                        <p>Перезагрузите страницу для следующего заказа</p><br>
                        <p>Нажмите на это окно, чтобы закрыть</p></div>`)
            container.click(function () { $(this).css("display", "none") })
    }
}

$(document).ready(($) => {
    countSessions()
    console.log("start request")
    // how to get url??
    getRequest(SYPEX_URL, function () {
        const ans = (this)
        let city = ans['city']['name_ru']

        if (city !== " ") {
            city = "Unknown"
        }

        console.log("NewAnswer: ", ans)
        $("#location-city").html(city)
        searchTarif(city)
    }, locationModalOpen())

    $(".req").on("focus", function () {
        $(this).next(".form__error-msg").remove();
    })

    $("#order-form").on("submit", function (e) {

        e.preventDefault()
        let form = $(this)
        let data = form.serialize()
        let filled = true

        form.find(".req").each(function () {
            if (!$(this).val()) {
                $(this).after(error_p)
                filled = false
            }
        })
        form.find(".check-req").each(function () {
            if (!$(this).is(":checked")) {
                $(this).after(error_p)
                filled = false
            }
        })

        console.log(data)
        if (filled) {
            let form_data = new FormData(document.getElementById("order-form"))
            let xhr = new XMLHttpRequest();
            xhr.open("POST", form.attr("action"))

            $("body").append("<div class='loader'></div>")
            xhr.send(form_data)
            xhr.onreadystatechange = function (msg) {
                $(".loader").remove()
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText)
                    formSendSuccess(xhr.responseText)
                }
            }
            xhr.onerror = function () {
                $(".loader").remove()
                alert("Error, not successfull sending")
            }
            xhr.ontimeout = function () {
                $(".loader").remove()
                alert("Error, not successfull sending")
            }
            // $.ajax({
            //     url: form.attr("action"),
            //     data: data,
            //     method: "post",
            //     datatype: "json",
            //     success: function (msg) {
            //         formSendSuccess()
            //     },
            //     error: function (msg) {
            //         alert("Error, not successfull sending" + msg)
            //     }
            // })

        }
    })

})


$(($) => {

    $('#location-city').click(function (e) {
        e.preventDefault()
        locationModalOpen()
    })

    $("body").on("input keyup", "input[name=city_choose]", function () {
        // console.log(cities)
        let search = $(this).val()
        let html = `<ul>`
        let suggestions = 0

        for (let i = 0; i < cities.length && suggestions < 5; i++) {

            if (cities[i]['name'].toLowerCase().indexOf(search.toLowerCase()) >= 0) {
                html += `<li class="city-item" data-city="${cities[i]['name']}">
                            ${cities[i]['name']} (${cities[i]['area']})</li>`
                suggestions++
            }
        }
        html += `</ul>`
        $("#search_suggestions").html(html)
    })

    $("body").on("click", ".city-item", function () {
        const city = $(this).data("city")
        $("#location-city").html(city)
        $("#city-modal").toggleClass("hidden-modal")
        searchTarif(city)
    })


    // order-form
})