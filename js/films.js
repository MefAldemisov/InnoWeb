// Table

// ganres
const ganres = ['фантастика', 'боевик', 'приключения', 'фэнтези', 'драмма', 'коммедия', 'мультфильм']

// timings
let start_film = [];
start_film[0] = '10:00';
start_film[1] = '12:00';
start_film[2] = '14:00';
start_film[3] = '16:00';

// film-names
let name_film = [];
name_film[0] = 'Человек-паук'
name_film[1] = 'Собачья жизнь 2'
name_film[2] = 'История игрушек 4'
name_film[3] = 'Люди в чёрном: Интернэшнл'

//  conacatenating
let ganre_film = []; 
ganre_film[0] = ganres[0] + ', ' + ganres[1] +', ' + ganres[2]
ganre_film[1] = ganres[3] + ', ' + ganres[4] +', ' + ganres[5]
ganre_film[2] = ganres[6] + ', ' + ganres[3] +', ' + ganres[5]
ganre_film[3] = ganres[0] + ', ' + ganres[1] +', ' + ganres[5]

// output (get info from HTML)
for (var i=0; i<4; i++){
    console.log('element-'+i+' name',document.getElementById('name_film_'+(i+1)))

    var element_start_film = document.getElementById('start_film_'+(i+1))
    var element_name_film = document.getElementById('name_film_'+(i+1))
    var element_ganre_film = document.getElementById('ganre_film_'+(i+1))

    console.log('element-'+i+' start', element_start_film)

    // content editing

    element_start_film.innerHTML = start_film[i]
    element_name_film.innerHTML = name_film[i]
    element_ganre_film.innerHTML = ganre_film[i]

    console.log('element-'+i+' new start', element_start_film)

    // output is always the same
}
console.log('finish')