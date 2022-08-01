<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Files</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css"
        integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
</head>

<body>

    <div class="container">

        <div class="">

            <div class="row">
                <div class="col-12">

                </div>
                <div class="col-md-12">
                    <form action="{{ route('upload') }}" method='post' enctype="multipart/form-data">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        <input type='file' name='file' id="country">
                        <label type="button" for="country"><i class="fa fa-upload"></i>Choose Country Csv File</label>
                        <button type="submit" class="d-none" id="submitCountry"></button>
                        <input type="hidden" name="form" value="country">
                        <div id='r'></div>
                    </form>
                </div>

                <div class="col-md-12">
                    <form action="{{ route('upload') }}" method='post' enctype="multipart/form-data">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        <input type='file' name='file' id="currency">
                        <label type="button" for="currency"><i class="fa fa-upload"></i>Choose Currency Csv File</label>
                        <button type="submit" class="d-none" id="submitCurrency"></button>
                        <input type="hidden" name="form" value="currency">
                        <div id='r'></div>
                    </form>
                </div>
            </div>
            <div class="text-end">

                <a href="{{ route('show-data') }}" class="btn btn-primary">View Data</a>
            </div>
        </div>

        <script src="{{ asset('asset/js/main.js') }}"></script>
</body>

</html>
