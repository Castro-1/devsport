<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>routine</title>
</head>
<body>

    <h1>{{ __('routine.routine_information') }}</h1>

    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong></strong> {{ $routine->getSpecifications() }}</li>
            </ul>
        </div>
    </div>
    
</body>
</html>
    

