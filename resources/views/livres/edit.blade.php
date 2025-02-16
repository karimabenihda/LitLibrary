<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <form method="POST" action="{{ route('livres.update', $livre->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name='titre'  value="{{ old('titre', $livre->titre) }}" class="form-control" placeholder="Titre">
        <input type="number" name='pages' value="{{ old('pages', $livre->pages) }}" class="form-control" placeholder="pages">
        <input type="text" name='description'  value="{{ old('description', $livre->description) }}" class="form-control" placeholder="description">
        <select  class="form-control" name='category_id' >
            @foreach($categories as $c)
            <option value="{{$c->id}}" {{ old('category_id', $livre->category_id) == $c->id ? 'selected' : '' }}>{{$c->nom}}</option>
            @endforeach
        </select>
        <input type="file" name="img" >
        <button class="btn btn-warning">Enregistrer les Modifications</button>
    </form>
</body>
</html>