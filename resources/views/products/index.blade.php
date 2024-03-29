<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodotti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
    .custom-table {
        border: 1.5px solid #007bff; 
    }
    .custom-table th, 
    .custom-table td {
        border: 1px solid #007bff;
    }
</style>
</head>
<body>
<div class="container my-4">
    <h1>Prodotti</h1>
    
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('aggiungi-prodotto') }}" class="btn btn-primary">Aggiunti un prodotto alla lista</a>
    </div>

    <div class="container my-3"> 
        <table class="table table-hover custom-table" border="1">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantità</th>
            <th>Prezzo</th>
            <th>Descrizione</th>
            <th>Immagine</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->nome }}</td>
                <td>{{ $product->qnt }}</td>
                <td>{{ $product->prezzo }}</td>
                <td>{{ $product->descrizione }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->nome }}" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('modifica-prodotto', ['product' => $product]) }}" class="btn btn-primary btn-sm">Modifica</a>
                </td>
                <td>
                    <form method="post" action="{{ route('rimuovi-prodotto', ['product' => $product]) }}">
                        @csrf 
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>        
    </div>
    </div>
</div>
</body>
</html>