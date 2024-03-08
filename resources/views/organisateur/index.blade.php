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


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    CREATION OF EVENTS
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ route('events.store')}}" method="POST" enctype="multipart/form-data">  
                @csrf

                <div class="lieu flex flex-col">
                        <label for="file" class="text-white">Image</label>
                        <input type="file" name="image" class="py-2 rounded-md">
                    </div>


                    <div class="title flex flex-col">
                        <label for="" class="text-white">Title</label>
                        <input type="text" name="title" class="py-2 rounded-md">
                    </div>

                    <div class="description flex flex-col">
                        <label for="" class="text-white">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="date flex flex-col">
                        <label for="" class="text-white">Date</label>
                        <input type="date" name="date" style="width:20%">
                    </div>

                    <div class="lieu flex flex-col">
                        <label for="" class="text-white">Lieu</label>
                        <input type="text" name="lieu" class="py-2 rounded-md">
                    </div>

                    <div class="numberplace flex flex-col">
                        <label for="" class="text-white">Number Of Places</label>
                        <input type="number" name="Number_places" class="py-2 rounded-md" style="width: 20%;">
                    </div>

                    <div class="category flex flex-col">
                        <label for="">Category</label>
                        <select name="category_id" id="">
                            @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->Category_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
            </form>
        </div>
    </div>
</div>

<section id="sidebar">
<!-- LOGO -->
    <a href="" class="logo">
    <i class='bx bxs-shield-plus'></i>
        <span class="text">EventsHUB</span>
    </a>

    <!-- UL here -->

    <ul class="side-menu top">
        <li class="active">
        <a href="{{route('organisateur')}}">
            <i class='bx bxs-dashboard' ></i>
                <span class="text">Les événements</span>
            </a>
        </li>

        <li>
            <a href="{{ route('Les-reservations.index')}}">
            <i class='bx bxs-dashboard' ></i>
                <span class="text">Les reservations</span>
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




        <main>
        <ul class="box-info statistiques">

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
            Events List
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">From Here you can manipulate the Events</p>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  ADD EVENTMENT
</button>
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
                    ACTIONS
                </th>
                <th scope="col" class="px-6 py-3">
                    METHOD
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
                <div>
                   <form action="{{ route('events.destroy' , ['event' => $event->id]) }} " method="post">
                   @csrf
                   @method('DELETE')
                   <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"  name="event">DELETE</button>



                   <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>
                   </form>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">Modifier</button>





                    <!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="post" action="{{ route('events.update' , ['event' => $event->id]) }}">
            @csrf
            @method('PATCH')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" value="{{$event->title}}" name="title" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number OF Place</label>
                        <input type="number" value="{{$event->Number_places}}" name="Number_places" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                   
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                           @foreach($categorys as $category)



                           @if($category === $event->category->Category_Name)
                           <option selected value="{{$category->id}}">{{$category->Category_Name}}</option>
                           @else
                           <option value="{{$category->id}}">{{$category->Category_Name}}</option>
                           @endif
                        

                           @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu</label>
                        <input type="text" value="{{$event->lieu}}" name="lieu" id="lieu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>

                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE</label>
                        <input type="date" value="{{$event->date}}" name="date" id="lieu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>


                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here">{{$event->description}}</textarea>                    
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Modify Event
                </button>
            </form>
        </div>
    </div>
</div> 

                </div>
                </td>
                
                <td class="px-6 py-4">
               <form action="{{ route('methodchanger')}}" method="post">
                @csrf
                <input type="text" name="event_id" value="{{$event->id}}" hidden>
               @if($event->method == 'auto')
                <button type="submit" name="method" value="auto" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">{{$event->method}}</button>
                @else
                <button type="submit" name="method" value="manuel" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{$event->method}}</button>
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