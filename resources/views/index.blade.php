<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h1 class="mb-5 fw-bolder">Kanye West Quotes</h1>

                    @foreach( $collection as $index => $quote )

                        <p> {{ $index + 1 }} ) {{ $quote }} </p>
                    
                    @endforeach

                    <div>
                        <a href="{{ Request::url() }}" class="btn btn-sm btn-primary mt-3">Refresh Quotes</a>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
