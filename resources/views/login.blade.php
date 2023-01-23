<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .h-100vh{
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center h-100vh align-items-center">
                <div class="col-md-4">
                    <form method="POST" action="/auth">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="bi bi-lock-fill"></i> </span>
                            <input type="password" class="form-control" placeholder="Enter password" name="password">
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-md btn-primary"> Login </button>
                        </div>
                        

                    </form>
                </div>   
            </div>
            
        </div>
        

    </body>

</html>
