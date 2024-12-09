<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center">View Books</h1>

    <div class="m-5">
        <a href="{{route('createBook')}}" class="">
            <button class="btn btn-success">Create</button>
        </a>
    </div>

    <div class="d-flex flex-row justify-content-center gap-5">
        @foreach ($books as $book)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('/storage/images/'.$book->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Title: {{$book->title}}</h5>
                    <p class="card-text">Author: {{$book->author}}</p>
                    <p class="card-text">Publication Date: {{$book->publication_date}}</p>
                    <p class="card-text">Stock: {{$book->stock}}</p>
                    <p class="card-text">Category: {{$book->category->category_name}}</p>
                    <a href="{{route('editBook', $book->id)}}" class="btn btn-success">Edit</a>

                    <form action="{{route('deleteBook', $book->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
