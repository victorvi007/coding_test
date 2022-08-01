
const country = document.getElementById('country');
const currency = document.getElementById('currency');
const submitCountry = document.getElementById('submitCountry');
const submitCurrency = document.getElementById('submitCurrency');

country.addEventListener('change',()=>{
    submitCountry.click();
})
currency.addEventListener('change',()=>{
    submitCurrency.click();
})
