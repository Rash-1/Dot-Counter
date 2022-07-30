<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dot Counter</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-secondary container text-center">
<div class="mt-5 container relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <form class="mt-5"  action="{{route('calculate')}}" method="post">
        @csrf
        <div class="mb-3 mt-5 ">
            <label for="string" class="form-label text-info">Type Your text:)</label>
            <textarea cols="7" rows="5" class="form-control rounded-5" id="string" placeholder="Type Anything And I Tell You How Many Dots it has..."  name="string"></textarea>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill col-4">Calculate</button>
    </form>
    @if(session()->has('result'))
        <div class="alert alert-info col-3 mt-2 border border-secondary rounded-pill ">
            <h6>
                Your Text: {{session()->get('string')}}
            </h6>
            <h6>
                Number of Dots: {{session()->get('result')}}
            </h6>
        </div>
    @endif
</div>
</body>
</html>

