var config = {
    cURL: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'emRHN29hVGNmeEM2bEtGR3l1a1BBVFhRamp2OEY0ak04c0UyUHlrbQ=='
}

var countrySelect = document.querySelector('.country'),
    countryState = document.querySelector('.state'),
    countryCity = document.querySelector('.city')

function loadCountries() {
    
    let apiEndpoint = config.cURL
    fetch(apiEndpoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        // console.log(data);

        data.forEach(country => {
            const option = document.createElement('option')
            option.value = country.iso2
            option.textContent = country.name
            countrySelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))

    countryState.disabled = true
    countryCity.disabled = true
    countryState.style.pointerEvents = 'none'
    countryCity.style.pointerEvents = 'none'
}

function loadStates() {
    countryState.disabled = false
    countryCity.disabled = true
    countryState.style.pointerEvents = 'auto'
    countryCity.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value

    countryState.innerHTML = '<option value="">select state</option>'

    fetch(`${config.cURL}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        // console.log(data);

        data.forEach(state => {
            const option = document.createElement('option')
            option.value = state.iso2
            option.textContent = state.name
            countryState.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))
}

function loadCities() {
    countryCity.disabled = false
    countryCity.style.pointerEvents = 'auto'

    const selectedCountryCode = countrySelect.value
    const selectedStateCode = countryState.value

    countryCity.innerHTML = '<option value="">select city</option>'

    fetch(`${config.cURL}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        // console.log(data);

        data.forEach(city => {
            const option = document.createElement('option')
            option.value = city.iso2
            option.textContent = city.name
            countryCity.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))
}

window.onload = loadCountries