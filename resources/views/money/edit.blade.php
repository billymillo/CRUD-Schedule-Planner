<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body class="w-100 h-100">
        <div class="container mt-4 w-75 h-100 d-flex flex-column justify-content-center ">
            <h1 class="text-center dancing-script mt-5">Daily Spend</h1>
            <div class="box mt-3 d-flex justify-content-center align-items-center">
                <form action="{{ route('spend.update.form', $money['id']) }}" method="POST">
                @csrf
                @method('PATCH')
                @if (Session::get('success'))
                    <div class="alert alert-success"> {{ Session::get('success') }} </div>
                @endif

                {{-- Check for Errors --}}
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                @endif

                    <label for="" class="mt-1 mb-1">Title Spend</label>
                <input type="text" placeholder="Input Activity" class="form-control" name="from" id="from">
                <label for="day" class="mt-1 mb-1 form-label">Total Spend</label>
                <input type="number" class="form-control" name="total" id = total>
                <label for="" class="mt-1 mb-1">Date</label>
                <input type="date" placeholder="Input date" class="form-control" name="date" id="date">
                <label for="" class="mt-1 mb-1">Description</label>
                <textarea name="to" id="to" cols="40" rows="2" class="form-control" placeholder="Input Description"></textarea>
            <div class="button d-flex justify-content-center align-items-center mt-3">
                <button class="btn btn-success ps-2 me-3 pe-2 " type="submit">Add To Daily Spend</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
