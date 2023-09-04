@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tp2_formulaire</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            margin : 20px 0px 0px 90px;  
        }
        .required {
            color : red;
        }
        .fieldset, input {
            border :1px solid black ;
            width : 700px;
        }
    </style>
</head>
<body> 
<h1 class="h1">Ajouter une nouvelle matière</h1>
    <form action="{{ route('classes.store') }}" method="post">  
    <fieldset class="fieldset"><br>
    @csrf
    <div class="container">
        <div class="row">
            <br>
            <div class="row">
            <div class="col-md-4 offset-md-1 mb-3">
                <label for="" class="form-label"><strong>Nom de la classe<span class="required">*</span></strong></label>
                <input type="text" class="form-control" id="" value="" name="name" placeholder="Exemple: Médecine" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-11 text-center">
            <button class="btn btn-primary" type="submit">Enregistrer</button> <a class="btn btn-secondary" href="{{ route('classes.index')}}">Annuler</a> <br><br><br>
            </div>
        </div>
    </div>
    </fieldset>
    </form>
    <script src="{{ asset('bootstrap/js/bootstrap.min.css')}}"></script>
</body>
</html>