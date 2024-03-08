<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/dashboard/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
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
        <li class="active">
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

        <li>
        <a href="{{ route('eve.index')}}">
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
        <ul class="box-info statistiques">

        <li>
                    <i></i>
                    <span class="text">
                    <h1 class="font-bold text-3xl">{{$usercount}}</h1>
                    <p class="text-xl">Users</p>
                </span>
                </li>

                <li>
                    <i></i>
                    <span class="text">
                    <h1 class="font-bold text-3xl">{{$categorycount}}</h1>
                    <p class="text-xl">Categories</p>
                </span>
                </li>

                <li>
                    <i></i>
                    <span class="text">
                    <h1 class="font-bold text-3xl">{{$eventscount}}</h1>
                    <p class="text-xl">Events</p>
                </span>
                </li>

        </ul>


        </main>


        <div class="tableusers">
            <table>

            </table>
        </div>



        <div class="tablesection">



        

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Users List
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">From Here you can manipulate the users access privileges</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    role
                </th>
                <th scope="col" class="px-6 py-3">
                    Access
                </th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($users as $user)


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->email}}
                </th>
                <td class="px-6 py-4">
                {{$user->name}}
                </td>
                <td class="px-6 py-4">
                {{$user->role}}
                </td>
                <td class="px-6 py-4">
                <form action="{{ route ('access')}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                @if($user->access === 'blocked')
                        <button name="access" value="Blocked" class="btn blockedbutton">Blocked</button>
                @else
                        <button name="access" value="Accessible" class="btn Accessiblebutton">Accessible</button>
                @endif
            </form>
                </td>
                
            </tr>


            @endforeach
            
        </tbody>
    </table>
</div>

        

        </div>


</section>



    
</body>
</html>