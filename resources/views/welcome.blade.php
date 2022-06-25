<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Exercises</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="container">
        <div class="row d-flex flex-column min-vh-100 justify-content-center align-items-center">

            <div class="col-md-8 mt-5">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <h2> Here you can add exercises </h2>
            </div>
            <div class="col-md-8">
                <form action="{{ url('store/exercises') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Exercise name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="hours" class="form-label">Hours</label>
                        <input type="text" class="form-control" id="hours" name="hours" required>
                    </div>
                    <div class="mb-3">
                        <label for="minutes" class="form-label">Minutes</label>
                        <input type="text" class="form-control" id="minutes" name="minutes" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary text-center">Save</button>
                    </div>
                </form>
            </div>

            @if(isset($exercises))


            <div class="row mt-5 d-flex justify-content-center align-items-center">
                <div class="col-md-4">

                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Hours</th>
                            <th>Minutes</th>
                        </thead>
                        <tbody>
                            @foreach($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->id}} </td>
                                <td>{{$exercise->name}} </td>
                                <td>{{$exercise->hours}} </td>
                                <td>{{$exercise->minutes}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-4">
                    <h4> Calculate number of days</h4>

                    <form action="{{ url('calculate/days') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary text-center">Calculate</button>
                    </div>
                </form>
                </div>
            </div>
            @endif





        </div>

    </div>

</body>

</html>