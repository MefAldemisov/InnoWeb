// Table

const ganres = ['фантастика', 'боевик', 'приключения', 'фэнтези', 'драмма', 'коммедия', 'мультфильм']

const films = [
    {
        start: '10:00', 
        name: 'Человек-паук', 
        ganre: '0/1/2',
        hire: true,
        new: false,
        price: 380,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '12:00', 
        name: 'Собачья жизнь 2', 
        ganre: '3/4/5',
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
        new: true,
        price: 400,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '16:00', 
        name: 'Люди в чёрном: Интернэшнл', 
        ganre: '0/1/5',
        hire: true,
        new: false,
        price: 340,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    {
        start: '14:00', 
        name: 'История игрушек 4', 
        ganre: '6/3/5',
        hire: false,
        new: true,
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
    } else if(films[i].new){
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
    }
}
// array of ordered tickets
const orders = []
// closing order form functionality
let orderFormContainer = document.getElementById("order-form__container")
let closeOrderForm = document.getElementById("order-form__close-btn")
closeOrderForm.onclick = function () {
    orderFormContainer.style.display = "none"
}
// tr editing
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