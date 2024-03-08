<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/user/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>


    <section id="navbar">

        <nav>

            <a href="" class="logo"><img src="{{ asset('assets/images/logo.png')}}" alt=""><span>EVENTO</span></a>



            <button><a href="{{ route('logout')}}">LOGOUT</a></button>

        </nav>

        <main>

            <div class="flex flex-col justify-center items-center">
                <h1>LET'S JOIN THE BIGGEST CONCERTS IN THE WORLD</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum aspernatur ea consectetur eos, voluptates delectus quia nemo qui illo quibusdam, adipisci explicabo aut sequi inventore ipsam rerum mollitia natus iure.</p>
            </div>

            <img src="{{ asset('assets/images/logo.png')}}" alt="">
        </main>






        <div class="event event1">
            <img src="{{asset ('assets/images/event.jpg')}}" alt="">

        </div>

        <div class="event event2">
            <img src="{{asset ('assets/images/event2.jpg')}}" alt="">

        </div>

        <div class="follows">
            <div class="d fb"><i class='bx bxl-facebook-square'></i></div>
            <div class="d insta"><i class='bx bxl-instagram-alt'></i></div>
            <div class="d twitter"><i class='bx bxl-twitter'></i></div>
            <div class="d twitter"><i class='bx bxl-github'></i></div>
        </div>

    </section>


    <div class="movingcategorys">
        <p id="H">Most recent categorys</p>
        <div class="moving-text">
            
            @foreach($categorys as $category) 
            @if($loop->iteration == 8)
            @break
            @endif
                    <h2>{{$category->Category_Name}}</h2>
            @endforeach

        </div>
    </div>



    <section id="page2">

    <video id="myVideo" autoplay muted loop>
  <source src="{{ asset('assets/images/Truss – Event Recap Video.mp4')}}" type="video/mp4">
</video>
        <h1>ENVENTO</h1>

    </section>






    <section id="page3">
        

        <div class="cate">
        <form action="{{ route('home') }}" method="GET">
    <button name="category" value="ALL" @if($selectedCategory === 'ALL') class="active" @endif>ALL</button>
    @foreach($categorys as $category)
        @if($selectedCategory == $category->id)
        <button name="category" class="active" value="{{ $category->id }}">{{ $category->Category_Name }}</button>
        @else
        <button name="category" value="{{ $category->id }}">{{ $category->Category_Name }}</button>
        @endif
    @endforeach
</form>

        </div>

            <form action="{{ route('home')}}" class="searcharea">
            <label for="search"><img src="{{ asset('assets/images/logo.png')}}" alt=""></label>
            <input type="text" name="search">
            </form>

        <div class="events">

        @foreach($events as $event)
        @php
            $base64Image = base64_encode($event->image);
        @endphp
            <a href="{{ route('page', ['event' => $event->id]) }}"  style="background-image: url(data:image/jpeg;base64,{{ $base64Image }})">
   
            </a>
        @endforeach

        <div id="text">

        <h3>EVENTO'S EVENTS</h3>
        <p>Click on one and discover it</p>


        </div>

        <div id="text2">
        <p>Click on one and discover it</p>
        <h3>EVENTO'S EVENTS</h3>
        


        </div>

        
        </div>

        <div class="pagination px-8">
    {{ $events->links() }}
</div>

        

     </section>















</body>
</html>