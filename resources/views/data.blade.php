<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Api data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css"
    integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container">
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="search" placeholder="Search by name" name="search" id="searchBox" class="form-control">
                        </div>
                        <div class="col-1">
                            <button class="btn btn-primary" id="searchBtn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row d-flex justify-content-center mt-2 g-4" id="dataList"></div>
        <div class="row d-flex justify-content-center mt-2 g-4" id="searchResult"></div>
        <p class="text-danger alert alert-danger" id="notFound" style="display:none">No result found</p>
        <div class="text-center m-3" id="paginate">

        </div>
</div>


<script>

    const search = document.getElementById('searchBox');
    const searchBtn = document.getElementById('searchBtn');
    const list = document.getElementById('dataList');
    const paginate = document.getElementById('paginate');
    const list2 = document.getElementsByClassName('list');
    const notFound = document.getElementById('notFound');
    let API_URL = `/api/countries${window.location.search}`;
    const API_URL_COUNTRY = '/api/country_all';
    let page;
    let listContent
    let response = fetch(API_URL);
    let response_country = fetch(API_URL_COUNTRY);


        list.innerHTML = " ";
            response.then(response=>response.json()).then((datas)=>{

                datas.map(data=>{

                            listContent = [];

                                    listContent = `
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <ul class="list-group list" id="list">
                                                <li class="list-group-item active" aria-current="true"> Country: ${data.official_name}</li>
                                                <li class="list-group-item">Continent Code: ${data.continent_code}</li>
                                                <li class="list-group-item">Currency Code: ${data.currency_code}</li>
                                                <li class="list-group-item">Iso Numeric Code: ${data.iso_numeric_code}</li>
                                                <li class="list-group-item"> Iso code: ${data.iso2_code}</li>

                                                <li class="list-group-item">Iso3 code: ${data.iso3_code}</li>
                                                <li class="list-group-item">Fips Code: ${data.fips_code}</li>
                                                <li class="list-group-item">Calling Code: +${data.calling_code}</li>
                                                <li class="list-group-item">Common Name: ${data.common_name}</li>
                                                <li class="list-group-item">Endonym: ${data.endonym}</li>
                                                <li class="list-group-item">Demonym: ${data.demonym}</li>
                                            </ul>
                                        </div>`;
                                        list.innerHTML += listContent;






                })




            })





    let currentUrl = window.location.pathname;

    console.log(window.location.href);
    console.log(window.location.search);

    for(let i = 1; i<12;i++){
        page = `<a href="/show-data?page=${i}" class="btn btn-primary mx-2" id="paginate">${i}</a>`
        paginate.innerHTML+=page
    }

//Searching each page

searchBtn.addEventListener('click',()=>{
    if(search.value.length > 0){
        list.innerHTML = " ";
        response_country.then(response=>response.clone().json()).then((datas)=>{
                datas.map(data=>{
                    let country = data.common_name.toLowerCase()
                    searchValue= search.value.toLowerCase()

                    if(country.match(searchValue)!=null){

                                        listContent = [];

                                                listContent = `
                                                <div class="col-12 col-md-4 col-lg-4">
                                                    <ul class="list-group list" id="list">
                                                        <li class="list-group-item active" aria-current="true"> Country: ${data.official_name}</li>
                                                        <li class="list-group-item">Continent Code: ${data.continent_code}</li>
                                                        <li class="list-group-item">Currency Code: ${data.currency_code}</li>
                                                        <li class="list-group-item">Iso Numeric Code: ${data.iso_numeric_code}</li>
                                                        <li class="list-group-item"> Iso code: ${data.iso2_code}</li>
                                                        <li class="list-group-item">Iso3 code: ${data.iso3_code}</li>
                                                        <li class="list-group-item">Fips Code: ${data.fips_code}</li>
                                                        <li class="list-group-item">Calling Code: +${data.calling_code}</li>
                                                        <li class="list-group-item">Common Name: ${data.common_name}</li>
                                                        <li class="list-group-item">Endonym: ${data.endonym}</li>
                                                        <li class="list-group-item">Demonym: ${data.demonym}</li>
                                                    </ul>
                                                </div>`;
                                                list.innerHTML += listContent;

                    }



                })


            })
    }
})

</script>
</body>
</html>
