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
            <h1 class="text-center dancing-script mt-5">Schedule Planner</h1>
            <div class="box mt-3 d-flex justify-content-center align-items-center">
                <form action="{{ route('planner.addto.schedule')}}" method="POST">
                    @csrf
                        @if(Session::get('success'))
                            <div class="alert alert-success"> {{ Session::get('success') }} </div>
                        @endif
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif

                    <label for="" class="mt-1 mb-1">Title Activity</label>
                <input type="text" placeholder="Input Activity" class="form-control" name="title" id="title">
                <label for="day" class="mt-1 mb-1 form-label">Days</label>
                <select name="days" id="days" class="form-select">
                    <option selected disabled hidden>Choose Your Days</option>
                    <option value="sunday" id="sunday" {{old('days') =='sunday' ? 'selected' : ''}}>Sunday</option>
                    <option value="monday" id="monday" {{old('days') =='monday' ? 'selected' : ''}}>Monday</option>
                    <option value="tuesday" id="tuesday" {{old('days') =='tuesday' ? 'selected' : ''}}>Tuesday</option>
                    <option value="wednesday" id="wednesday" {{old('days') =='wednesday' ? 'selected' : ''}}>Wednesday</option>
                    <option value="thursday" id="thursday" {{old('days') =='thursday' ? 'selected' : ''}}>Thursday</option>
                    <option value="friday" id="friday" {{old('days') =='friday' ? 'selected' : ''}}>Friday</option>
                    <option value="saturday" id="saturday" {{old('days') =='saturday' ? 'selected' : ''}}>Saturday</option>
                </select>
                <label for="" class="mt-1 mb-1">Time</label>
                <input type="time" placeholder="Input Time" class="form-control" name="time" id="time">
                <label for="" class="mt-1 mb-1">Description</label>
                <textarea name="description" id="description" cols="40" rows="2" class="form-control" placeholder="Input Description"></textarea>
            <div class="button d-flex justify-content-center align-items-center mt-3">
                <button class="btn btn-success ps-2 me-3 pe-2 " type="submit">Add To Schedule Planner</button>
                <button class="btn btn-primary ps-2 pe-2 ">
                    <a href="{{route('planner.table')}}" class='text-white link-underline-primary'>My Schedule Planner</a></button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
