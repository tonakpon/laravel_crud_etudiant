<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Edit</title> 
    <style>
        body {
            margin : 20px 0px 0px 90px;  
        }
        .required {
            color : red;
        }
        .fieldset {
            border :1px solid black ;
            width : 1100px;
        }
    </style>
</head>
<body>
    <h1 class="h1">Modification des informations</h1>
<form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" enctype="multipart/form-data">
    <fieldset class="fieldset"><br>
    @csrf
    @method('Put')
    <div class="row">
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Nom<span class="required">*</span></strong></label>
            <input type="text" class="form-control" id="" value="{{ $etudiant->name }}" name="name" placeholder="Nom" required>
        </div>
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Prénoms<span class="required">*</span></strong></label>
            <input type="text" class="form-control" id="" value="{{ $etudiant->fname }}" name="fname" placeholder="Prénoms" required>
        </div>
    </div>
        <div class="row">
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Tel<span class="required">*</span></strong></label>
            <input type="number" class="form-control" id="" value="{{ $etudiant->tel }}" name="tel" placeholder="Tel" required>        
        </div>
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Date Naiss<span class="required">*</span></strong></label>
            <input type="date" class="form-control" id="" value="{{ $etudiant->date }}" name="date" required>
        </div>
    </div>
    <div class="row">
            <div class="col-md-9 offset-md-1 mb-3">
            <label for="classe_id"><strong>Classe<span class="required">*</span></strong></label>
                <select name="classe_id" id="classe_id" class="form-select" value="{{ $etudiant->get_classe->classe_id }}">
                    <optgroup label="Valeur par défaut">
                        <option value="{{ $etudiant->classe_id }}"> {{ $etudiant->get_classe->name }} </option>
                    </optgroup>
                    <optgroup label="Valeur disponibles">
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-11 text-center">
                <button class="btn btn-primary" type="submit">Enregistrer</button> <a class="btn btn-secondary" href="{{ route('etudiants.index')}}">Annuler</a> <br><br><br>
            </div>
    </div>
    </fieldset>
</form>
</body>
</html>