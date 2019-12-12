

let p = new Promise((resolve, reject) => {

    var url = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=e2c01b015b375681951ef2536440f652';
  
    var request = new XMLHttpRequest(); //XHR
  
    request.open('GET', url, true);
  
    request.onload = function () {
      if (this.status >= 200 && this.status < 400) {
        // Success!
  
        var data = JSON.parse(this.response);
        //console.log(data)
        resolve(data)
      } else {
        // We reached our target server, but it returned an error
        reject()
      }
    };
  
    request.onerror = function () {
  
      // There was a connection error of some sort
    };
  
    request.send();
  
  })
  
  
  p.then((data) => {
    const films = data.results
  
    // console.log('films:', films)
    const urlServerApiImages = 'https://image.tmdb.org/t/p/w185_and_h278_bestv2'
  
    const filmsForSlider = films.map(film => {
      return ({
        nameFilm: film.title,
        genre_ids: film.genre_ids,
        poster_path: 'https://image.tmdb.org/t/p/w185_and_h278_bestv2' + film.poster_path,
        release_date: film.release_date
      })
    })
  
    //console.log('filmsForSlider', filmsForSlider)
  
    let htmlFilmsBlock = document.getElementById('films')
    
    htmlFilmsBlock.innerHTML = ''
    console.log(htmlFilmsBlock)
  
  
  })
  
  
  