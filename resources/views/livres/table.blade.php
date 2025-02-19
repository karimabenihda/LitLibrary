

    @foreach($livres as $livre)
    <tr>
        <td>{{$livre->titre}}</td>
        <td>{{$livre->pages}}</td>
        <td>{{$livre->description}}</td>
        <td>
            <img src="{{asset('storage/'.$livre->image)}}" alt="{{$livre->titre}}" width="100">
        </td>
        <td>{{$livre->category->nom}}</td>
        <td>
            <a href="{{route('livres.edit',$livre->id)}}" class="btn btn-success">Modifier</a>
            <form action="{{route('livres.destroy',$livre->id)}}"  method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach

