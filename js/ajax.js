const SYPEX_URL = "https://api.sypexgeo.net/json/"
const CITIES_URL = "http://glavpunkt.ru/api/get_rf_cities"
let cities
let DEL_PRICE // delivery price (the same for all tickets)

function searchTarif(city) {
    const url = `https://glavpunkt.ru/api/get_tarif?serv=выдача&cityFrom=Санкт-Петербург&cityTo=${city}&weight=0.1&price=500&paymentType=prepaid`
    
    getRequest(url, function() {
        const result = $.parseJSON(this)
        if (result["result"]==="ok") {
            DEL_PRICE = result["tarif"]
        } 
    })
}

function locationModalOpen() {
    if (!cities) {
        getRequest(CITIES_URL, function() {
            cities = $.parseJSON(this)
        })
    }
    $("#city-modal").toggleClass("hidden-modal")
}

function getRequest(api_url, callback, errorHandler=null) {
    const xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function() {

        if(xhr.readyState === 4 && xhr.status === 200) {
            callback.call(xhr.responseText)
        } 
    }

    xhr.onerror = errorHandler
    xhr.open("GET", api_url, true)
    xhr.send() 
}

$(document).ready(($) => {
    console.log("start request")
    // how to get url??
    getRequest(SYPEX_URL, function() {
        const ans = $.parseJSON(this)
        let city = ans['city']['name_ru']
        if (city !== " ") {
            city = "Unknown"
        }
        console.log("NewAnswer: ", ans)
        $("#location-city").html(city)
        searchTarif(city)
    }, locationModalOpen())
    
})

$(($) => {

    $('#location-city').click(function(e) {
        e.preventDefault()
        locationModalOpen()
    })

    $("body").on("input keyup", "input[name=city_choose]", function() {
        // console.log(cities)
        let search = $(this).val()
        let html = `<ul>`
        let suggestions = 0
        for(let i=0; i<cities.length && suggestions<5; i++) {
            if(cities[i]['name'].toLowerCase().indexOf(search.toLowerCase()) >= 0) {
                html += `<li class="city-item" data-city="${cities[i]['name']}">${cities[i]['name']} (${cities[i]['area']})</li>`
                suggestions ++
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

    
})