<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Create a New Trip</h2>

<form method="post" action="{{ url('/trips') }}">
    @csrf

    <label for="date">Trip Date:</label>
    <input type="date" name="date" required><br><br>

    <label for="locations">Locations:</label>
    <select name="locations[]" multiple required>
        @foreach($locations as $location)
            <option value="{{ $location->id }}">{{ $location->name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Create Trip</button>
</form>
    
</body>
</html>



