<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Address Form Autofill</title>
    <style>
        #autofill-form {
  background-color: #F5F5F5;
  margin-bottom: 48px;
  padding: 24px;
  display: flex;
  align-items: center;
  flex-direction: column;
}

.autofill--text {
  font-family: '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Helvetica', 'Arial',
    'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
  color: #171417;
}

.autofill--secondary-text {
  color: #959B9E;
}

.autofill--heading {
  font-weight: 500;
  font-size: 14px;
  padding-bottom: 8px;
  width: 400px;
}

.autofill--background-icon {
  background-size: 16px !important;
  background-position-x: 16px !important;
  background-position-y: 50% !important;
  background-repeat: no-repeat !important;
}

.autofill--row {
  display: block;
  position: relative;
  margin-bottom: 16px;
  width: 400px;
}

.autofill--findme {
  display: flex;
  align-items: center;
  cursor: pointer;
  color: #3333FF;
}

.autofill--findme img {
  display: none;
}

.autofill--input {
  box-sizing: border-box;
  padding: 8px 16px;
  width: 100%;
  height: 40px;
  background-color: #FFFFFF;
  border: 1px solid #E0DDDE;
  border-radius: 4px;
}

.autofill--input::placeholder {
  color: #777777;
  opacity: 1;
}

.autofill--input:hover,
.autofill--input:focus {
  outline: none;
  border-color: #3333FF;
}

#autofill-dropdown {
  display: none;
  position: absolute;
  box-sizing: border-box;
  background-color: #FFFFFF;
  border-radius: 4px;
  border: 1px solid #F4F4F4;
  width: 400px;
  top: 40px;
  z-index: 1;
}

#autofill-suggestions {
  list-style-type: none;
  margin: 0;
  padding: 0;
  max-height: 300px;
  overflow-y: scroll;
}

.autofill--dropdown-item:hover {
  background-color: #F1F1F1;
}

.autofill--dropdown-item {
  padding: 16px;
  background: #FFFFFF;
  box-shadow: inset 0px -1px 0px #F4F4F4;
  width:100%;
  border: none;
  text-align: left;
}

.autofill--dropdown-item div {
  pointer-events: none;
}

.autofill--copyright {
  background: #FAF8F8;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.autofill--error {
  padding: 8px 16px;
  padding-left: 48px;
  background: #FCEDEC;
  color: #980500;
  border: 1px solid rgba(152, 5, 0, 0.3);
  border-radius: 4px;
  margin: 8px;
  background-image: url('https://files.readme.io/62b6781-errorIcon.svg');
}

.autofill-button {
  background: #3333FF;
  border-radius: 4px;
  outline: none;
  margin-left: 16px;
  padding: 8px 16px;
  box-shadow: none !important;
  border: none;
  color: #fff;
  cursor: pointer;
}

.autofill--row:nth-child(2)  p {
  font-size: 14px;
  margin: 12px 0;
}

.autofill--row:last-child {
  display: flex;
  justify-content: flex-end;
}

.autofill-button:first-child {
  color: #3333FF;
  border: 1px solid #3333FF;
  background: #fff;
  margin: 0px;
}

@media only screen and (min-width: 640px) {
  .autofill--row {
    display: flex;
  }

  .autofill--findme {
    flex-direction: row;
  }

  .autofill--findme img {
    display: block;
    width: 14px;
    padding: 0px 5px;
  }
}
    </style>
  </head>
  <body>
    <form id="autofill-form">
      <div class="autofill--text autofill--heading">Demo</div>
      <div class="autofill--row">
        <p class="autofill--text">
          Center search on my currrent location.
        </p>
        <div class="autofill--text autofill--findme" id="autofill-findme">
          <img src="https://files.readme.io/0d519df-image.png"/> 
          Find me
        </div>
      </div>
      <div class="autofill--row" id="autofill-search-container">
        <input
          type="text"
          id="autofill-search"
          class="autofill--input autofill--text"
          placeholder="Address"
        /><br />
        <div id="autofill-dropdown" class="autofill--text">
          <ul id="autofill-suggestions"></ul>
          <div id="autofill-error" class="autofill--error autofill--background-icon">
            Something went wrong. Please refresh and try again.
          </div>
          <div id="autofill-not-found" class="autofill--error autofill--background-icon"></div>
          <div class="autofill--copyright">
            <img src="https://files.readme.io/a8cc85b-Group_7.png" alt="powered by foursquare" />
          </div>
        </div>
      </div>
      <div class="autofill--row">
        <input
          type="text"
          id="autofill-address2"
          class="autofill--input autofill--text"
          placeholder="Apt, Suite, etc (optional)"
        />
      </div>
      <div class="autofill--row">
        <input
          type="text"
          id="autofill-city"
          class="autofill--input autofill--text"
          placeholder="City"
        />
      </div>
      <div class="autofill--row">
        <input
          type="text"
          id="autofill-region"
          class="autofill--input autofill--text"
          placeholder="State/Province"
        />
      </div>
      <div class="autofill--row">
        <input
          type="text"
          id="autofill-postcode"
          class="autofill--input autofill--text"
          placeholder="Zip/Postal Code"
        />
      </div>
      <div class="autofill--row">
        <input
          type="text"
          id="autofill-country"
          class="autofill--input autofill--text"
          placeholder="Country"
        />
      </div>
      <div class="autofill--row">
        <input type="reset" value="Clear" class="autofill-button autofill--text" />
        <input type="submit" value="Done" class="autofill-button autofill--text" />
      </div>
      <script>
        function localAddressAutoFillJs() {
  const fsqAPIToken = 'fsq35j8ii0Yy4+P6F08glIswb2mr1VTrdyvIkrb2SqDpv10=';
  let sessionToken = generateRandomSessionToken();
  const addressInput = document.getElementById('autofill-search');
  const dropDownField = document.getElementById('autofill-dropdown');
  const ulField = document.getElementById('autofill-suggestions');
  const errorField = document.getElementById('autofill-error');
  const notFoundField = document.getElementById('autofill-not-found');
  const cityInput = document.getElementById('autofill-city');
  const regionInput = document.getElementById('autofill-region');
  const countryInput = document.getElementById('autofill-country');
  const postcodeInput = document.getElementById('autofill-postcode');
  const address2Input = document.getElementById('autofill-address2');
  const form = document.getElementById('autofill-form');
  const searchContainer = document.getElementById('autofill-search-container');
  const findMeButton = document.getElementById('autofill-findme');
  let latLng = {};
  let isFetching = false;
  form && form.addEventListener('submit', (e) => e.preventDefault(), true);
  const onChangeAutoComplete = debounce(changeAutoComplete);
  addressInput && addressInput.addEventListener('input', onChangeAutoComplete);
  searchContainer && searchContainer.addEventListener('focusin', focusEventAutoComplete);
  searchContainer && searchContainer.addEventListener('focusout', focusEventAutoComplete);
  ulField && ulField.addEventListener('click', selectItem);
  findMeButton && findMeButton.addEventListener('click', getCurrentPosition);

  function focusEventAutoComplete(event) {
    if (event.type === 'focusin' && event.target.value) {
      dropDownField.style.display = 'block';
    } else if (
      event.type === 'focusout' &&
      !event.currentTarget.contains(event.relatedTarget)
    ) {
      dropDownField.style.display = 'none';
    }
  }

  function getCurrentPosition() {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        latLng.lat = position.coords.latitude;
        latLng.lng = position.coords.longitude;
      },
      (error) => {
        if (error) {
          latLng = {};
          console.warn(error);
        }
      }
    );
  }

  function logError(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }

  /* Generate a random string with 32 characters.
           Session Token is a user-generated token to identify a session for billing purposes. 
           Learn more about session tokens.
           https://docs.foursquare.com/reference/session-tokens
        */
  function generateRandomSessionToken(length = 32) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    for (let i = 0; i < length; i++) {
      result += characters[Math.floor(Math.random() * characters.length)];
    }
    return result;
  }

  async function changeAutoComplete({ target }) {
    const { value: inputSearch = '' } = target;
    ulField.innerHTML = '';
    notFoundField.style.display = 'none';
    errorField.style.display = 'none';
    if (inputSearch.length && !isFetching) {
      try {
        isFetching = true;
        const results = await autoComplete(inputSearch);
        if (results && results.length) {
          results.forEach((value) => {
            addItem(value);
          });
        } else {
          notFoundField.innerHTML = `Foursquare can't
find ${inputSearch}. Make sure your search is spelled correctly.`;
          notFoundField.style.display = 'block';
        }
      } catch (err) {
        errorField.style.display = 'block';
        logError(err);
      } finally {
        isFetching = false;
        dropDownField.style.display = 'block';
      }
    } else {
      dropDownField.style.display = 'none';
    }
  }

  async function autoComplete(query) {
    try {
      const params = {
        query,
        types: 'address',
        session_token: sessionToken,
      };
      if (latLng.lat && latLng.lng) {
        params.ll = `${latLng.lat},${latLng.lng}`;
      }
      const searchParams = new URLSearchParams(params).toString();
      const searchResults = await fetch(
        `https://api.foursquare.com/v3/autocomplete?${searchParams}`,
        {
          method: 'get',
          headers: new Headers({
            Accept: 'application/json',
            Authorization: fsqAPIToken,
          }),
        }
      );
      const data = await searchResults.json();
      return data.results;
    } catch (error) {
      throw error;
    }
  }

  function addItem(value) {
    const { link } = value;
    if (!link) return;
    ulField.innerHTML +=
      `<button class="autofill--dropdown-item autofill--text" data-object=${link}>
<div>${highlightedNameElement(value.text)}</div>
<div class="autofill--secondary-text">${value.text.secondary}</div>
</button>`;
  }

  async function selectItem({ target }) {
    if (target.tagName === 'BUTTON') {
      const link = target.dataset.object;
      const addressDetail = await fetchAddressDetails(link);
      const { location = {} } = addressDetail;
      const {
        address = '',
        country = '',
        postcode = '',
        locality = '',
        region = '',
      } = location;
      addressInput.value = address;
      address2Input.value = '';
      countryInput.value = country;
      postcodeInput.value = postcode;
      cityInput.value = locality;
      regionInput.value = region;
      // generate new session token after a complete search
      sessionToken = generateRandomSessionToken();

      address2Input && address2Input.focus();
      dropDownField.style.display = 'none';
    }
  }

  async function fetchAddressDetails(link) {
    try {
      const results = await fetch(`https://api.foursquare.com${link}`, {
        method: 'get',
        headers: new Headers({
          Accept: 'application/json',
          Authorization: fsqAPIToken,
        }),
      });
      const data = await results.json();
      return data;
    } catch (err) {
      logError(err);
    }
  }

  function highlightedNameElement(textObject) {
    if (!textObject) return '';
    const { primary, highlight } = textObject;
    if (highlight && highlight.length) {
      let beginning = 0;
      let hightligtedWords = '';
      for (let i = 0; i < highlight.length; i++) {
        const { start, length } = highlight[i];
        hightligtedWords += primary.substr(beginning, start - beginning);
        hightligtedWords += '<b>' + primary.substr(start, length) + '</b>';
        beginning = start + length;
      }
      hightligtedWords += primary.substr(beginning);
      return hightligtedWords;
    }
    return primary;
  }

  function debounce(func, timeout = 300) {
    let timer;
    return (...args) => {
      clearTimeout(timer);
      timer = setTimeout(() => {
        func.apply(this, args);
      }, timeout);
    };
  }
}

localAddressAutoFillJs();
      </script>
    </form>
  </body>
  </html>
   