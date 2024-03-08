<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/organisateur/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

<section id="sidebar">
    <!-- LOGO -->
    <a href="" class="logo">
        <i class='bx bxs-shield-plus'></i>
        <span class="text">EventsHUB</span>
    </a>

    <!-- UL here -->
    <ul class="side-menu top">
        <li>
            <a href="{{ route('organisateur') }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Les événements</span>
            </a>
        </li>

        <li class="active">
            <a href="{{ route('Les-reservations.index') }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Les reservations</span>
            </a>
        </li>
    </ul>

    <!-- logout section -->
    <ul class="side-menu">
        <li>
            <a href="{{ route('logout') }}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>

<section id="content">
    <main>
        <ul class="box-info statistiques">
            <li>
                <form action="{{ route('page.reservation') }}" method="post">
                    @csrf
                    <select name="event" id="">
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Search</button>
                </form>
            </li>
        </ul>
    </main>
    

    @if(isset($reservations))
   
        @if(count($reservations) > 0)

        <div class="tablesection">
        

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                           
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Reservations Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            $99
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
            </div>

        @else
        <h1>NO RESERVATIONS FOUND</h1>
        @endif

    @endif


</section>

</body>
</html>
