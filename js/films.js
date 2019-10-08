// Table

// ganres
const ganre_1 = 'фантастика'
const ganre_2 = 'боевик'
const ganre_3 = 'приключения'
const ganre_4 = 'фэнтези'
const ganre_5 = 'драмма'
const ganre_6 = 'коммедия'
// timings
let start_film_1 = '10:00'
let start_film_2 = '12:00'
let start_film_3 = '14:00'
let start_film_4 = '16:00'
// film-names
let name_film_1 = 'Человек-паук'
let name_film_2 = 'Собачья жизнь 2'
let name_film_3 = 'История игрушек'
let name_film_4 = 'Люди в чёрном: Интернэшнл'

console.log('comment, film1', name_film_1)

//  conacatenating
console.log(ganre_1 + ', ' + ganre_2 +', ' + ganre_3)
let ganre_film_1 = ganre_1 + ', ' + ganre_2 +', ' + ganre_3
let ganre_film_2 = ganre_3 + ', ' + ganre_4 +', ' + ganre_6
let ganre_film_3 = ganre_1 + ', ' + ganre_2 +', ' + ganre_3
let ganre_film_4 = ganre_1 + ', ' + ganre_2 +', ' + ganre_3

// output (get info from HTML)
console.log('element-1 name',document.getElementById('name_film_1'))

let element_start_film_1 = document.getElementById('start_film_1')
let element_name_film_1 = document.getElementById('name_film_1')
let element_ganre_film_1 = document.getElementById('ganre_film_1')

console.log('element-1 start', element_start_film_1)

// content editing

element_start_film_1.innerHTML = start_film_1
element_name_film_1.innerHTML = name_film_1
element_ganre_film_1.innerHTML = ganre_film_1
console.log('element-1 new start', element_start_film_1)

// output is always the same