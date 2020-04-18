
let filmsForSlider = {}

let p = new Promise((resolve, reject) => {

    var url = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=e2c01b015b375681951ef2536440f652';
  
    var request = new XMLHttpRequest(); //XHR
  
    request.open('GET', url, true);
  
    request.onload = function () {
      if (this.status >= 200 && this.status < 400) {
        // Success!
        var data = JSON.parse(this.response);
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
  
    const urlServerApiImages = 'https://image.tmdb.org/t/p/w185_and_h278_bestv2'
  
    filmsForSlider = films.map(film => {
      return ({
        start: Math.floor(Math.random()*24) + ".00",
        name: film.title,
        year: parseInt(film.release_date),
        new: film.release_date > "2019-01-01",
        price: Math.floor(Math.random()*20+20)*10,
        description: film.overview,
        link: urlServerApiImages + film.poster_path,
        image: urlServerApiImages + film.poster_path,
        hire: true,
        social: {
          facebook: "https://www.facebook.com",
          twitter: "https://twitter.com",
          behance: "https://www.behance.net",
          dribble: "https://dribbble.com"
        }

      })
    })
    filmsUser(filmsForSlider)
  })
  
  
  