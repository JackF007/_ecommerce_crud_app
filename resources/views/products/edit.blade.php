<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container my-2">
        <h1>Modifica prodotto</h1>
        <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
     
    <div class="container my-1">
    <form method="post" action="{{route('update-prodotto',['product' => $product])}}" enctype="multipart/form-data">
        @csrf        
        @method('put')
        
        <div class="form-group mb-2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
    <input type="text" class="form-control" name="nome" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" value="{{$product->nome}}">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
        <span class="input-group-text">#</span>
            </div>
    <input type="text" class="form-control" name="qnt" placeholder="Quantità" aria-label="Quantità" value="{{$product->qnt}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
         <span class="input-group-text">€</span>
             </div>
    <input type="text" class="form-control" name="prezzo" placeholder="Prezzo" aria-label="Prezzo" value="{{$product->prezzo}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
        <span class="input-group-text">📝</span>
            </div>
    <input type="text" class="form-control" name="descrizione" placeholder="Descrizione" aria-label="Descrizione" value="{{$product->descrizione}}">
        </div>
      <div>
      <div class="form-group mb-2">
                <label for="image">Immagine Attuale:</label>
                @if($product->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="Immagine attuale" style="max-width: 100px;">
                    </div>
                @else
                    <p>Nessuna immagine caricata</p>
                @endif
            </div>

            <div class="form-group mb-2">
                <label for="newImage">Carica Nuova Immagine:</label>
                <input type="file" class="form-control" id="newImage" name="image">
            </div>
      <button type="submit" class="btn btn-primary">Update</button>
        </div>
</div>
</body>
</html>