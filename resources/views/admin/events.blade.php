<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/dashboard/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>Document</title>
</head>

<body>


<section id="sidebar">
<!-- LOGO -->
    <a href="" class="logo">
    <i class='bx bxs-shield-plus'></i>
        <span class="text">AdminHUB</span>
    </a>

    <!-- UL here -->

    <ul class="side-menu top">
        <li>
            <a href="{{ route('dashboard')}}">
            <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('categorys.index')}}">
            <i class='bx bx-hard-hat'></i>
                <span class="text">Les Categories</span>
            </a>
        </li>

        <li class="active">
            <a href="{{ route('events.index')}}">
            <i class='bx bx-plus-medical'></i>
                <span class="text">Les événements</span>
            </a>
        </li>
    </ul>

    <!-- logout section -->

    <ul class="side-menu">
			<li>
				<a href="{{ route('logout')}}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>

</section>


<section id="content">
    <!-- navbar -->

    <nav>
			<i class='bx bx-menu' ></i>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>

			<a href="{{route('profile.edit')}}" class="profile">
				<img src="img/people.png">
			</a>
		</nav>


        <main>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        categories List
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">From Here you can manipulate the users access privileges</p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    TITLE
                </th>
                <th scope="col" class="px-6 py-3">
                    DESCRIPTION
                </th>
                <th scope="col" class="px-6 py-3">
                    DATE
                </th>
                <th scope="col" class="px-6 py-3">
                    LIEU
                </th>
                <th scope="col" class="px-6 py-3">
                    CATEGORY
                </th>
                <th scope="col" class="px-6 py-3">
                    AVAILABLE SEATS
                </th>
                <th scope="col" class="px-6 py-3">
                    WAYS
                </th>
            </tr>
        </thead>
                    <tbody>




                        
            @foreach($events as $event)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$event->title}}
                </th>
                <td class="px-6 py-4">
                <p>{{$event->description}}</p>
                </td>
                <td class="px-6 py-4">
                {{$event->date}}
                </td>
                <td class="px-6 py-4">
                {{$event->lieu}}
                </td>
                <td class="px-6 py-4">
                {{$event->category->Category_Name}}
                </td>
                <td class="px-6 py-4">
                {{$event->Number_places}}
                </td>

                <td class="px-6 py-4">
                       <form action="{{ route('eve.edit' , ['eve' => $event->id])}}" method="get">
                       @csrf
                       @if($event->status === 'forbiden')
                        <button type="submit" name="status" value="forbiden" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
    FORBIDDEN
</button>
                        @else
                        <button type="submit" name="status" value="public" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
    ALLOWED
</button>
                        @endif
                    </form>
                </td>


                        </tr>


                        @endforeach
                     


                        <!-- form update -->








                    </tbody>
                </table>
            </div>
        </main>


</section>


</body>
</html>