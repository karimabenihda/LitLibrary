<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <h1>Gestion des Livres</h1>
<a href="{{route('livres.create')}}" class="btn btn-info">Ajouter un Livre</a>    
{{-- <a href="{{route('categories.create')}}" class="btn btn-warning">Ajouter une Category</a> --}}
<select name="category" id="category" class="form-select" onchange="filtrer()">
    @foreach($categories as $c)
    <option value="{{$c->id}}">{{$c->nom}}</option>
    @endforeach
</select>
<div
        class="table-responsive">
        <table
            class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">titre</th>
                    <th scope="col">Pages</th>
                    <th scope="col">description</th>
                     <th scope="col">image</th>   
                     <th scope="col">category</th>
                     <th scope="col">Actions</th>
                    </tr>
            </thead>
            <tbody>
                @foreach( $livres as $livre)
                <tr>
                    <td>{{$livre->titre}}</td>
                    <td>{{$livre->pages}}</td>
                    <td>{{$livre->description}}</td>
                    <td>
                        <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->titre }}" width="100">
                    </td>
                    <td>{{$livre->category->nom ?? 'No category'}}</td>
                    <td><a href="{{route('livres.edit',$livre->id)}}"  class="btn btn-success">modifier</a>
                        <form action="{{route('livres.destroy',$livre->id)}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
function filtrer(){
    var category_id=$('#category').val();
    $.ajax({
        url:"{{route('livres.index')}}",
        method:"GET",
        data:{
            category:category_id
        },
        success:function(response){
            $('tbody').html(response);
        }

    });
}
    </script>
</body>
</html>