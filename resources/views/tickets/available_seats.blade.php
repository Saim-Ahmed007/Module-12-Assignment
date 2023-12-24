<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Available Seats for Trip on {{ $trip->date }}</h2>

    @foreach($availableSeats as $seat)
        <a href="{{ url("/trips/{$trip->id}/seats/{$seat}") }}">
            <div class="seat {{ in_array($seat, $purchasedSeats) ? 'purchased' : '' }}">
                {{ $seat }}
            </div>
        </a>
    @endforeach
    
</body>
</html>