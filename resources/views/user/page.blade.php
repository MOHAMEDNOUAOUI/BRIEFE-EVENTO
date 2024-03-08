<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/user/page.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>


<a href="{{ route('home')}}" style="width:2rem;height:2rem"><img style="width:4rem;height:4rem" src="{{ asset('assets/images/logo.png')}}"  alt=""></a>

<section id="navbar">

        @php
         $base64Image = base64_encode($event->image);
        @endphp
        <div class="content" style="background-image: url(data:image/jpeg;base64,{{ $base64Image }})">
            <div class="overlay"></div>

            <div class="text">
                <h1>{{$event->title}}</h1>
            </div>

            <p>Available tickets {{$event->Number_places}}</p>
        </div>
</section>


<div class="reservation">
@if($reser)
<button>Already Booked</button>
@else
@if($event->Number_places > 0)
                <form action="{{route ('reservation.create')}}" method="get">
                @csrf
                <button type="submit" name="event" value="{{$event->id}}">Reserver</button>
                </form>
                @else
                <button>Sold Out</button>
                @endif
@endif
</div>

<div class="category">
            <h3>category</h3>
            <p>{{$event->category->Category_Name}}</p>
        </div>

        <div class="description">
            <h3>description</h3>
            <p>{{$event->description}}</p>
        </div>

        <div class="description">
            <h3>Lieu</h3>
            <p>{{$event->description}}</p>
        </div>

       
    
</body>
</html>