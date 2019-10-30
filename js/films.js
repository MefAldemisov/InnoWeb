// Table
// TODO -> svg preprocessing - add subtag, save only 'path part'
const ganres = ['фантастика', 'боевик', 'приключения', 'фэнтези', 'драмма', 'коммедия', 'мультфильм']
// array og svgs for social networks: <<Hardkodit' tak hardkodit'>>

const svg_around = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    preserveAspectRatio="xMidYMid" width="34" height="33.97" viewBox="0 0 34 34">`

const social_icons = {
    facebook: `<path
                d="M17.006,32.359 C8.528,32.359 1.656,25.477 1.656,16.988 C1.656,8.498 8.528,1.616 17.006,1.616 C25.484,1.616 32.356,8.498 32.356,16.988 C32.356,25.477 25.484,32.359 17.006,32.359 ZM17.377,8.564 C13.910,8.564 14.700,12.683 14.585,14.185 C14.585,14.196 12.465,14.185 12.465,14.185 L12.465,16.979 L14.578,16.979 L14.578,26.815 L18.090,26.815 L18.082,16.979 L20.435,16.979 L20.896,14.169 L18.090,14.200 C18.090,12.205 17.936,11.394 19.101,11.394 C19.205,11.394 20.907,11.390 20.907,11.390 L20.911,8.564 L17.377,8.564 Z"
                class="svg-icon" />
            `,
    twitter: ` <path
                d="M17.006,32.372 C8.528,32.372 1.656,25.490 1.656,17.000 C1.656,8.510 8.528,1.628 17.006,1.628 C25.484,1.628 32.356,8.510 32.356,17.000 C32.356,25.490 25.484,32.372 17.006,32.372 ZM25.167,15.480 C23.981,11.347 21.132,11.347 21.132,11.347 C21.132,11.347 22.341,10.659 22.307,10.240 C21.934,9.973 21.188,10.508 21.125,10.508 C21.314,10.376 21.202,9.998 20.958,9.856 C20.597,9.891 20.283,10.555 20.283,10.555 C20.283,10.555 20.107,10.229 19.946,10.229 C18.039,10.753 16.696,15.160 16.702,15.166 C10.476,10.957 10.063,11.766 10.063,11.777 C9.575,12.872 11.470,14.258 11.470,14.258 L10.928,14.274 C10.928,14.274 10.132,14.248 10.306,14.817 C10.483,15.545 11.427,16.299 11.435,16.307 C11.900,16.528 12.482,16.318 12.482,16.318 C12.482,16.318 11.865,16.641 11.475,16.885 C10.833,17.300 11.294,17.669 11.364,17.739 C12.201,18.636 13.516,18.578 13.516,18.578 C13.516,18.578 12.905,19.311 12.900,19.590 C12.900,20.044 13.307,20.324 13.342,20.359 C13.706,20.609 14.244,20.638 14.249,20.638 C10.880,24.213 6.819,20.617 6.819,20.604 C7.273,23.223 11.121,25.750 17.888,24.772 C23.376,23.899 25.132,17.879 25.132,17.879 C25.132,17.879 27.399,18.007 27.655,16.656 C26.946,16.784 25.923,16.575 25.923,16.575 C25.923,16.575 27.667,15.818 27.748,14.910 C26.725,15.701 25.202,15.480 25.167,15.480 Z"
                class="svg-icon" />
            `,
    behance: `  <path
                d="M17.493,32.359 C9.016,32.359 2.143,25.477 2.143,16.988 C2.143,8.498 9.016,1.616 17.493,1.616 C25.971,1.616 32.843,8.498 32.843,16.988 C32.843,25.477 25.971,32.359 17.493,32.359 ZM17.656,14.336 C17.656,10.863 13.882,11.142 13.882,11.142 L8.283,11.144 L8.291,23.467 L13.514,23.432 C13.514,23.432 18.007,23.778 18.047,19.743 C18.047,17.393 16.152,16.829 16.152,16.829 C16.152,16.829 17.656,16.284 17.656,14.336 ZM25.992,11.812 L21.200,11.812 L21.200,13.187 L25.992,13.187 L25.992,11.812 ZM23.541,13.920 C18.955,13.920 19.180,18.733 19.180,18.733 C19.180,18.733 18.925,23.472 23.631,23.472 C27.255,23.472 27.782,20.480 27.782,20.480 L25.451,20.480 C25.451,20.480 25.075,21.535 23.691,21.519 C21.421,21.519 21.496,19.321 21.496,19.321 L27.887,19.290 C27.887,19.290 28.549,13.920 23.541,13.920 ZM23.526,15.887 C25.496,15.887 25.541,17.755 25.541,17.755 L21.541,17.785 C21.541,17.785 21.691,15.887 23.526,15.887 ZM13.411,21.299 L10.804,21.289 L10.794,18.005 C10.794,18.005 12.380,18.016 13.446,18.016 C13.442,18.016 15.456,17.875 15.456,19.542 C15.456,21.539 13.411,21.299 13.411,21.299 ZM13.431,15.993 L10.799,16.008 L10.799,13.282 L13.072,13.294 C13.072,13.294 15.205,13.011 15.205,14.607 C15.205,16.204 13.431,15.993 13.431,15.993 Z"
                class="svg-icon" />
            `,
    dribble: `  <path
                d="M17.003,32.259 C8.526,32.259 1.653,25.376 1.653,16.886 C1.653,8.396 8.526,1.515 17.003,1.515 C25.481,1.515 32.353,8.396 32.353,16.886 C32.353,25.376 25.481,32.259 17.003,32.259 ZM16.906,4.981 C10.306,4.981 4.955,10.350 4.955,16.974 C4.955,23.597 10.306,28.966 16.906,28.966 C23.506,28.966 28.857,23.597 28.857,16.974 C28.857,10.350 23.506,4.981 16.906,4.981 ZM19.763,16.460 C19.491,15.775 19.210,15.104 18.912,14.459 C22.489,13.079 24.541,10.708 24.541,10.708 C24.541,10.708 26.565,12.888 26.747,16.443 C26.747,16.428 22.827,15.873 19.763,16.460 ZM14.408,7.407 C14.408,7.407 19.204,5.876 23.347,9.487 C21.113,11.760 18.130,12.875 18.130,12.875 C16.811,9.898 14.408,7.407 14.408,7.407 ZM7.264,14.891 C7.264,14.891 7.979,10.460 12.464,8.143 C14.914,11.098 16.184,13.563 16.184,13.563 C16.184,13.563 12.527,14.754 7.264,14.891 ZM17.801,16.894 C17.801,16.894 13.133,17.746 9.401,23.388 C6.728,20.286 7.062,16.598 7.061,16.579 C13.789,16.367 17.002,15.130 17.002,15.130 L17.801,16.894 ZM18.480,18.619 C19.592,21.198 20.444,26.205 20.444,26.205 C20.444,26.205 15.609,28.394 10.854,24.779 C10.861,24.779 13.552,19.997 18.480,18.619 ZM26.690,18.232 C26.046,23.180 22.326,25.240 22.326,25.240 C21.704,21.609 20.412,18.188 20.412,18.188 C20.412,18.188 23.389,17.695 26.690,18.232 Z"
                class="svg-icon" />
            `
}
let s
for (s of Object.keys(social_icons)){
    social_icons[s] = svg_around + social_icons[s] + "</svg>"
}

const films = [
    {
        start: '10:00', 
        name: 'Человек-паук', 
        ganre: '0/1/2',
        // temporary it is a file name
        // in the future it will be web link
        image: "./images/film_spiderman.png",
        // kinopoisk one 
        link: "https://www.kinopoisk.ru/film/838/",
        // now the same for all films
        social: {   facebook: "https://www.facebook.com", 
                    twitter: "https://twitter.com",
                    behance:"https://www.behance.net",
                    dribble:"https://dribbble.com"},
        hire: true,
        new: true,
        price: 380,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '12:00', 
        name: 'Собачья жизнь 2', 
        ganre: '3/4/5',
        image: "./images/film_dog.png",
        link: "https://www.kinopoisk.ru/film/1122114/",
        social: {   facebook: "https://www.facebook.com", 
                    twitter: "https://twitter.com",
                    behance:"https://www.behance.net",
                    dribble:"https://dribbble.com"},
        hire: true,
        new: true,
        price: 320,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '14:00', 
        name: 'История игрушек 4', 
        ganre: '6/3/5',
        hire: false,
        new: false,
        price: 400,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '16:00', 
        name: 'Люди в чёрном: Интернэшнл', 
        ganre: '0/1/5',
        image: "./images/film_black.png",
        link: "https://www.kinopoisk.ru/film/693730/",
        social: {   facebook: "https://www.facebook.com", 
                    twitter: "https://twitter.com",
                    behance:"https://www.behance.net",
                    dribble:"https://dribbble.com"},
        hire: true,
        new: true,
        price: 340,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '14:00', 
        name: 'История игрушек 4', 
        ganre: '6/3/5',
        hire: false,
        new: false,
        price: 390,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '16:00', 
        name: 'Люди в чёрном: Интернэшнл', 
        ganre: '0/1/5',
        hire: true,
        new: false,
        price: 350,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    }
]
// for timetable
const hired_films = []
// for slider
const new_films = []

for(let i=0; i<films.length; i++){
    if(films[i].hire){
        hired_films.push(films[i]);
    } 
    if(films[i].new){
        new_films.push(films[i])
    }
}

const film = {
    getName: function(){
        return this.name
    },
    getStart: function(){
        return this.start
    },
    getGanre: function(){
        let ganres_indexes  = this.ganre.split('/');
        let ganre_parts = []
        for(let i=0; i<ganres_indexes.length; i++){
            ganre_parts.push(ganres[ganres_indexes[i]])
        }
        let film_ganre = ganre_parts.join(', ')
        return film_ganre
    },
    getPrice: function(){
        return this.price
    },
    getLink: function(){
        return this.link
    },
    getImage:function () {
        return this.image
    },
    getSocial: function()  {
        return this.social
    },
    getSocialList: function() {
        return (Object.keys(this.social))
    }
}
// array of ordered tickets
const orders = []
// closing order form functionality
const orderFormContainer = document.getElementById("order-form__container")
const closeOrderForm = document.getElementById("order-form__close-btn")
closeOrderForm.onclick = function () {
    orderFormContainer.style.display = "none"
}
// table modification
for (let i=0; i<hired_films.length; i++) {
    // fill the table (HTML)
    const body = document.getElementById('timetable__rows')
    const tr = document.createElement('tr')
    const tr_text = `<tr><td>${film.getStart.bind(films[i])()}</td>
                        <td>${film.getName.call(films[i])}</td>
                        <td>${film.getGanre.bind(films[i])()}</td>
                        <td>${film.getPrice.bind(films[i])()}</td>
                        <td><img class="timetable__plus-img" src="images/plus.png" alt="plus sign"></td></tr>`
    // set the elements
    tr.innerHTML = tr_text
    tr.className = "timetable__film-row"
    // last chid - plus button
    tr.lastChild.lastChild.onclick = function () {
        // show the form
        orderFormContainer.style.display = "block"
        // enter the data to the form
        document.getElementById("order-form__film-name").innerHTML = film.getName.call(films[i])
        document.getElementById("order-form__start-time").innerHTML = film.getStart.call(films[i])
        document.getElementById("order-form__ganre").innerHTML = film.getGanre.call(films[i])
        // update price
        const formTotal = document.getElementById("order-form__total")
        formTotal.innerHTML = film.getPrice.call(films[i])
        formTicketsAmount = document.getElementById("order-form__tikets-amount").onchange = function() {
            formTotal.innerHTML = this.value * film.getPrice.call(films[i])
        }
        // save order
        document.getElementById("order-form__film-price").innerHTML = film.getPrice.call(films[i])
        document.getElementById("order-form__order-btn").onclick = function() {
            const c_name = document.getElementById("order-form__customer-name")
            const c_ph = document.getElementById("order-form__phone-number")
            function checker (input){
                if(input.value){
                    input.style.border="1px solid green"
                }else{
                    input.style.border="2px solid red"
                }
                return Boolean(input.value)
            }
            // if all required fields are filled, then add the order to the array
            if(checker(c_name) && checker(c_ph)){
                orders.push({
                    customerName: c_name.value,
                    customerPhone: c_ph.value,
                    total: parseFloat(formTotal.innerHTML)
                })
            }
        }
    }
    body.appendChild(tr)
}

// cntainer to insert 
const filmsSlider = document.getElementsByClassName("films__container")[0]
let f
for (f of new_films) {

    let content_text = `
    <div class="film__content">
    <a href="${film.getLink.call(f)}" target="_blank" title="Кинопоиск: ${film.getName.call(f)}">
        <h3 class="film__title">${film.getName.call(f)}</h3>
    </a>
    <hr class="film__hr">
    <p class="film__description">${film.getGanre.call(f)}</p>
    <div class="film__social">
                        `
    // add social links 
    if(film.getSocial.call(f)){
        // selecting social network
        let soc_net
        for (soc_net of ["facebook", "twitter", "behance", "dribble"]){
            if (film.getSocialList.call(f).includes(soc_net)){
                // appending
                let addition = `<a href=${film.getSocial.call(f)[soc_net]} target="_blank" title="${soc_net} social network">`                
                addition += social_icons[soc_net]+"</a>"
                content_text += addition
            }
        }
    }
    // closing of the tags
    content_text += `</div></div>`
    // connecting with HTML
    const film_box = document.createElement("article")
    film_box.className = "film__box"
    film_box.innerHTML = `<img class="film__icon" src="${film.getImage.call(f)}" alt="${film.getName.call(f)} illustration">`
    film_box.innerHTML += content_text
    
    filmsSlider.appendChild(film_box)
}
// slider modification