<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container my-2">
        <h1>Aggiungi prodotto</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            @endif 
        </div>
    </div>
    <div class="container mt-4">
    <form method="POST" action="/store-prodotto" enctype="multipart/form-data">
        @csrf        

        <div class="form-group mb-2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
    <input type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" name="nome">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
        <span class="input-group-text">#</span>
            </div>
    <input type="text" class="form-control" name="qnt" placeholder="Quantità" aria-label="Quantità">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
         <span class="input-group-text">€</span>
             </div>
    <input type="text" class="form-control" name="prezzo" placeholder="Prezzo" aria-label="Prezzo">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
        <span class="input-group-text">📝</span>
            </div>
    <input type="text" class="form-control" name="descrizione" placeholder="Descrizione" aria-label="Descrizione">
        </div>

        <div class="form-group mb-2">
                <label for="image">Immagine del Prodotto:</label>
                <input type="file" class="form-control" id="image" name="image">
        </div>

        <div>
    <button type="submit" class="btn btn-primary">Salva nuovo prodotto</button>
        </div>
    </div>
</body>
</html>