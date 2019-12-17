
function filmsUser(films) {
  console.log(films)
  //--------------------------------------------------------SVG----------------------------------------------------
  // array of svgs for social networks: <<Hardkodit' tak hardkodit'>>
  const svgAround = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    preserveAspectRatio="xMidYMid" width="34" height="33.97" viewBox="0 0 34 34">`

  // Genereation of icons to insert to films description  
  const socialIcons = {
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
  for (s of Object.keys(socialIcons)) {
    socialIcons[s] = svgAround + socialIcons[s] + "</svg>"
  }

  //------------------------------------------------------FILMS DATA-----------------------------------------------

  // film datatype
  const film = {
    getName: function () {
      return this.name;
    },
    getStart: function () {
      return this.start;
    },
    getPrice: function () {
      return this.price;
    },
    getLink: function () {
      return this.link;
    },
    getImage: function () {
      return this.image;
    },
    getSocial: function () {
      return this.social;
    },
    getSocialList: function () {
      return Object.keys(this.social);
    },
    getDescription: function () {
      return this.description;
    },
    getYear: function () {
      return this.year;
    }
  }

  //-----------------------------------------------------FILMS FILTERING------------------------------------------

  let hiredFilms = []

  // for slider
  const newFilms = []

  // new and hird arrays filling
  for (let i = 0; i < films.length; i++) {
    if (films[i].hire) {
      hiredFilms.push(films[i])
    }
    if (films[i].new) {
      newFilms.push(films[i])
    }
  }
  //  --------------------------------------------------ORDERS-------------------------------------------------------
  const orders = [];
  let currentPlaces = [];

  function getPriceByNumber(number) {
    if (number < 3 || number > AMOUNT_OF_PLACES - 3) {
      return 100
    }
    return 200
  }

  // Tickets counter changing
  const ticketsCounter = $("#order-form__tikets-amount")
  function changeTicketsCounter(isAdded) {
    if (isAdded) {
      ticketsCounter.text(function () {
        return (parseInt(this.textContent) + 1)
      })
    } else {
      ticketsCounter.text(function () {
        return (parseInt(this.textContent) - 1)
      })
    }
  }
  // Total price generation
  const formFilmPrice = $("#order-form__film-price")
  const formTotal = $("#order-form__total")
  formTotal.val(0)

  function changePriceCounter(seat, isAdded) {
    const difference = parseInt(formFilmPrice.text()) + getPriceByNumber(seat)
    const initial = parseInt(formTotal.val())
    if (isAdded) {
      formTotal.val(initial + difference)
    } else {
      formTotal.val(initial - difference)
    }
  }

  const placesList = $("#order-form__places-list")
  placesList.text("")

  function updatePlacesList() {
    // outputs list of places to the placesList
    let output = ""
    for (let place of currentPlaces) {
      output += ` м-${place.number} р-${place.row},`
    }
    output = output.slice(0, output.length - 1)
    placesList.text(output)
  }

  // Chosing one more/less place

  function saveElementAsBronned(place, isAdded) {
    changeTicketsCounter(isAdded)
    changePriceCounter(place.number, isAdded)

    if (isAdded) {
      currentPlaces.push(place)
    } else {
      currentPlaces = currentPlaces.filter((element) => element !== place)
    }
    updatePlacesList()
  }


  function getDeliveryPrice(initialPrice) {
    if (!DEL_PRICE) {
      return 0
    } else {
      return DEL_PRICE
    }
  }
  //--------------------------------------------------------PLACES GENERATION-----------------------------------------------------------------

  // places creation
  const AMOUNT_OF_PLACES = 10    // const, defined by the space
  const AMOUNT_OF_ROWS = 5       // const, defined by the space
  const places = []              // array of places objects

  // places array generation
  for (let i = 0; i < AMOUNT_OF_PLACES * AMOUNT_OF_ROWS; i++) {
    const seatNumber = (i % AMOUNT_OF_PLACES) + 1
    const placePrice = getPriceByNumber(seatNumber)

    places.push({
      number: seatNumber,
      row: Math.floor(i / AMOUNT_OF_PLACES) + 1,
      price: placePrice,
      brone: Math.round(Math.random())
    });
  }
  //-----------------------------------------------------FORM INSERT DOM----------------------------------------------------------------------

  // closing ordearray of ordered ticketsr form functionality
  const orderFormContainer = $("#order-form__container")
  const closeOrderForm = $("#order-form__close-btn")

  closeOrderForm.click(function () {
    orderFormContainer.css("display", "none")
  });

  // html of cinema places generation
  const placesChoiceContainer = $("<div></div>")
  placesChoiceContainer.addClass("form__seats")

  const placesDescription = $("<span></span>")
  placesDescription.addClass("centered")
  placesDescription.text("Выберите место")
  // seats addition

  const placesContainer = document.createElement("div")

  placesContainer.id = "order-form__seats"
  placesContainer.className = "order-form__seats"
  placesContainer.style.display = "grid"
  placesContainer.style.cssText = "grid-template-columns: repeat(" + AMOUNT_OF_PLACES + "}, 1fr); grid-template-rows: repeat(" + AMOUNT_OF_ROWS + "}, 1fr);"
  //------------------------------------------------------------------EVENTS-------------------------------------------------------------------


  // show price on right click
  placesContainer.addEventListener("mousedown", function (event) {

    if (event.button === 2) {
      placesDescription.innerHTML = `Стоимость: ${getPriceByNumber(event.srcElement.style.gridColumn)}`
    }

  })

  // places insertion
  for (let place of places) {

    const placeDiv = document.createElement("div")
    placeDiv.innerHTML = place.number
    placeDiv.classList.add("placeDiv")
    placeDiv.style.gridColumn = place.number
    placeDiv.style.gridRow = place.row

    // default coloring
    if (place.brone) {
      placeDiv.classList.add("bronnedPlace")
    }

    // click data changing
    placeDiv.addEventListener("click", function (event) {

      if (!place.brone) {
        placeDiv.classList.toggle("newBronnedPlace")
        saveElementAsBronned(place, placeDiv.classList.contains("newBronnedPlace"))
      }

    })

    // change color
    placeDiv.addEventListener("mouseover", function (event) {

      if (!place.brone) {
        this.classList.add("hoveredPlace")
      }

    })

    // return color
    placeDiv.addEventListener("mouseout", function (event) {

      if (!place.brone) {
        this.classList.remove("hoveredPlace")
      }
    })

    // click GUI
    placeDiv.addEventListener("click", function (event) {

      if (!place.brone) {
        placesDescription.innerHTML = `Ряд: ${place.row} 
                                     Место: ${place.number}`
      } else {
        placesDescription.innerHTML = "Место занято"
      }

    })

    // DOM appending
    placesContainer.appendChild(placeDiv);

  }

  placesChoiceContainer.append(placesDescription)
  placesChoiceContainer.append(placesContainer)

  const form = $("#order-form")
  const formChildren = form.children()
  const body = $("#timetable__rows");
  const child_selector = "#order-form :nth-child(" + (formChildren.length) + ")"
  placesChoiceContainer.insertBefore($(child_selector))
  // $(child_selector).insertBefore(placesChoiceContainer)

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  const custName = $("#order-form__customer-name");
  if (getCookie("name")) {
    custName.html(getCookie("name"))
  }

  const custEmail = $("#input_mail");
  if (getCookie("email")) {
    custEmail.html(getCookie("email"))
  }
  const custPhone = $("#order-form__phone-number");
  if (getCookie("phone")) {
    custPhone.html(getCookie("phone"))
  }
  //---------------------------------------------------------------SORT--------------------------------------------------------
  function strcmp(a, b) {
    if (a > b) {
      return 1
    } else if (a === b) {
      return 0
    }
    return -1
  }

  function compareStart(a, b) {
    return Math.sign(parseFloat(a.start)-parseFloat(b.start))
  }

  function compareStartInv(a, b) {
    return -1 * compareStart(a, b)
  }

  function compareName(a, b) {
    return strcmp(a.name, b.name)
  }
  function compareNameInv(a, b) {
    return -1 * compareName(a, b)
  }

  hiredFilms = hiredFilms.sort(compareName)
  // ------------------------------------------------TABLE---------------------------------------------------------

  function fillTable(films) {

    for (let i = 0; i < films.length; i++) {
      // fill the table (HTML)
      const tr = document.createElement("tr");
      const trText = `<tr><td>${film.getStart.bind(films[i])()}</td>
                          <td>${film.getName.call(films[i])}</td>
                          <td>${film.getDescription.bind(films[i])()}</td>
                          <td>${film.getYear.bind(films[i])()}</td>
                          <td>${film.getPrice.bind(films[i])()}</td>
                          <td><img class="timetable__plus-img" src="images/plus.png" alt="plus sign"></td></tr>`

      // set the elements
      tr.innerHTML = trText;
      tr.className = "timetable__film-row";
      // last chid - plus button
      // -----------------------------------------------FORM-------------------------------------------------------
      tr.lastChild.onclick = function () {
        // show the form
        orderFormContainer.css("display", "block");

        // enter the data to the form
        $("#order-form__film-name").html(film.getName.call(films[i]));
        $("#order-form__start-time").html(film.getStart.call(films[i]));
        $("#order-form__description").html(film.getDescription.call(films[i]));
        formFilmPrice.html(film.getPrice.call(films[i]));
        $("#order-form__delivery-price").html(getDeliveryPrice(film.getPrice.call(films[i])))

        // save order 
        $("#order-form").on("submit", function (e) {

          e.preventDefault()
          function isEmptyInput(input) {
            if (input.val()) {
              input.css("border", "1px solid green");
            } else {
              input.css("border", "2px solid red");
            }
            return Boolean(input.val());
          }
          isEmptyInput(custName)
          isEmptyInput(custPhone)
          isEmptyInput(custEmail)

        });
      };
      body.append(tr);
    }

  }

  function emptyTable() {
    for (ch of body.children()) {
      ch.remove()
    }
  }

  fillTable(hiredFilms)

  $("th:nth-of-type(1)").click(
    function () {
      // styles
      is_upper = $(this).hasClass("upper_triangle")
      $(this).toggleClass("upper_triangle")
      // inside table 
      emptyTable()
      if (is_upper) {
        hiredFilms = hiredFilms.sort(compareStart)
      } else {
        hiredFilms = hiredFilms.sort(compareStartInv)
      }
      fillTable(hiredFilms)

    })
  $("th:nth-of-type(2)").click(
    function () {
      // styles
      is_upper = $(this).hasClass("upper_triangle")
      $(this).toggleClass("upper_triangle")
      // inside table
      emptyTable()
      if (is_upper) {
        hiredFilms = hiredFilms.sort(compareName)
      } else {
        hiredFilms = hiredFilms.sort(compareNameInv)
      }
      fillTable(hiredFilms)
    }
  )

  // --------------------------------------------------------------SLIDER-----------------------------------------------------------
  const filmsSlider = document.getElementsByClassName("films__container")[0];

  let f;
  for (f of newFilms) {

    let contentText = `
    <div class="film__content">
    <a href="${film.getLink.call(f)}" target="_blank" title="Кинопоиск: ${film.getName.call(f)}">
        <h3 class="film__title">${film.getName.call(f)}</h3>
    </a>
    <hr class="film__hr">
    <p class="film__description">${film.getDescription.call(f)}</p>
    <div class="film__social">
                        `
    // add social links

    if (film.getSocial.call(f)) {
      // selecting social network

      let socNet;
      for (socNet of ["facebook", "twitter", "behance", "dribble"]) {

        if (film.getSocialList.call(f).includes(socNet)) {
          // appending
          let addition = `<a href=${film.getSocial.call(f)[socNet]} target="_blank" title="${socNet} social network">`;
          addition += socialIcons[socNet] + "</a>";
          contentText += addition;
        }

      }

    }
    // closing of the tags
    contentText += `</div></div>`;

    // connecting with HTML
    const filmBox = document.createElement("article");
    filmBox.className = "film__box";
    filmBox.innerHTML = `<img class="film__icon" src="${film.getImage.call(f)}" 
                         alt="${film.getName.call(f)} illustration">`
    filmBox.innerHTML += contentText;

    filmsSlider.appendChild(filmBox);
  }
  addSlider()
}