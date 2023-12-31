<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Tableau</title>
</head>
<body>
<div class="container">
        <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h1>Affichage des classes enregistrées</h1>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('classes.create')}}">Ajouter</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la classe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($classes as $item)
                    <tr>
                        <td>{{ $rowNumber++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('classes.destroy',$item->id) }}" method="post">
                                <a class="btn btn-primary" href="{{ route('classes.edit',$item->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <!-- <button type="submit" class="btn btn-danger">Supprimer</button> -->
                                
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$item->id}}">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel_{{$item->id}}">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       êtes vous sûrs de vouloir supprimer la matière {{$item->name}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-danger">Oui</button> 
      </div>
    </div>
  </div>
</div>
                            </form> 
                      </td>
                    </tr  >

                   <!-- Button trigger modal -->

                    @endforeach
                    </tbody>
                </table>
</body>
</html>
