// Table

const ganres = ['фантастика', 'боевик', 'приключения', 'фэнтези', 'драмма', 'коммедия', 'мультфильм']

let films = [
    film1 = {
        start: '10:00', 
        name: 'Человек-паук', 
        ganre: '0/1/2',
        hire: true,
        new: false,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    film2 = {
        start: '12:00', 
        name: 'Собачья жизнь 2', 
        ganre: '3/4/5',
        hire: true,
        new: true,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    film3 = {
        start: '14:00', 
        name: 'История игрушек 4', 
        ganre: '6/3/5',
        hire: false,
        new: true,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    film4 = {
        start: '16:00', 
        name: 'Люди в чёрном: Интернэшнл', 
        ganre: '0/1/5',
        hire: true,
        new: false,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    film5 = {
        start: '14:00', 
        name: 'История игрушек 4', 
        ganre: '6/3/5',
        hire: false,
        new: true,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    },
    film6 = {
        start: '16:00', 
        name: 'Люди в чёрном: Интернэшнл', 
        ganre: '0/1/5',
        hire: true,
        new: false,
        description: 'Lorem ipsum dolor sit amet, consectetur'
    }
]
// for timetable
let hired_films = []
// for slider
let new_films = []
for(let i=0; i<films.length; i++){
    if(films[i].hire){
        hired_films.push(films[i]);
    }else if(films[i].new){
        new_films.push(films[i])
    }
}

const film = {
    getName: function(){
        console.log(this.name)
        return this.name
    },
    getStart: function(){
        console.log(this.start)
        return this.start
    },
    getGanre: function(){
        let ganres_indexes  = this.ganre.split('/');
        let ganre_parts = []
        for(let i=0; i<ganres_indexes.length; i++){
            ganre_parts.push(ganres[ganres_indexes[i]])
        }
        let film_ganre = ganre_parts.join(', ')
        console.log(film_ganre)
        return film_ganre
    }
}

for (var i=0; i<hired_films.length; i++) {
    console.group("Film " + i)
    let body = document.getElementById('timetable__rows')
    let tr = document.createElement('tr')
    let tr_text = `<tr><td>${film.getStart.bind(films[i])()}</td>
                        <td>${film.getName.call(films[i])}</td>
                        <td>${film.getGanre.bind(films[i])()}</td>
                        <td><img class="timetable__plus-img" src="images/plus.png" alt="plus sign"></td></tr>`
    // get the elements
    tr.innerHTML = tr_text
    body.appendChild(tr)
    console.groupEnd()
}