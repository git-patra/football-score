<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSS Bundle --}}
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <title>Footbal League</title>
</head>

<body>

    <main id="footbal-league" class="container footbal-league">
        <header class="p-3">
            <h2><img src="{{ asset('images/171.svg') }}"> Football League</h2>
            <div class="row mt-5">
                <div class="col-xl-5 col-md-7 col-sm-12">
                    @yield('modal-league')
                    @yield('modal-club')
                </div>
            </div>
        </header>

        {{-- Score Match --}}
        @yield('score')

        {{-- Club Standings --}}
        @yield('standing')

    </main>

    <script src="{{ asset('js/all.js') }}"></script>
</body>

</html>