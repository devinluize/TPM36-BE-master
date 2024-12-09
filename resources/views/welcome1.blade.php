<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>

    {{-- css & js --}}

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    {{-- <h1>
    <p>
    <a href>
    <img>
    <br>
    <hr>
    <label for="name">
    <form>
    <input>
    <button>
    <table
    <tr> -> table row
    <td> -> table data
    <th> -> table header
    <div class> --}}

    <h1>TPM 36 BE</h1>
    <h2>TPM 36 BE</h2>
    <h3>TPM 36 BE</h3>
    <h4>TPM 36 BE</h4>
    <h5>TPM 36 BE</h5>
    <h6>TPM 36 BE</h6>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tenetur nostrum nisi quam nemo eius amet veritatis laudantium libero, animi necessitatibus ex exercitationem beatae repudiandae placeat expedita corrupti unde? Delectus. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur minus illo a nihil ut blanditiis omnis eos praesentium quas tempore, dolores impedit perferendis vitae soluta pariatur maiores cupiditate inventore explicabo.</p>

    <a href="/view">Tekan Saya</a>

    <img src="" alt="">

    <hr>

    <form action="">
        <div class="username">
            <label for="">Username</label>
            <input type="text">
        </div>

        <div class="password">
            <label for="">Password</label>
            <input type="password">
        </div>

        <button type="button" class="btn btn-primary">Submit</button>
    </form>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

    <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ asset('image/asset.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ asset('image/wallpaper.jpg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    {{-- java script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
