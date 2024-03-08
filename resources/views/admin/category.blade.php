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
            <li class="">
                <a href="{{ route('dashboard')}}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="active">
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
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

    </section>



    <section id="content">

        <nav>
            <div class="topper">
                <h3>ADDING CATEGORY</h3>
                <form action="{{ route('categorys.store')}}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Category Name">
                    <button type="submit">Add</button>
                </form>
            </div>

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
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ways
                            </th>

                        </tr>
                    </thead>
                    <tbody>




                        @foreach($categories as $category)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$category->Category_Name}}
                            </td>

                            <td class="px-6 py-4">
                                <div>
                                    <form action="{{ route('categorys.destroy', ['category' => $category->id]) }}" method="POST" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="deletecategory">Delete</button>
                                    </form>
                                    <button type="button" id="updatecategory" data-modal-target="default-modal" data-modal-toggle="default-modal" value="{{ $category->id }}">Modify</button>
                                </div>
                            </td>


                        </tr>


                          <!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Category name modifyer
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
                <form action="{{ route('categorys.update' , ['category' => $category->id])}}" method="post">
                @csrf
                @method('PUT')
                    <input type="text" name="category">
                    <button type="submit">Submit</button>
                </form>
            </div>
           
        </div>
    </div>
</div>

                        @endforeach


                        <!-- form update -->








                    </tbody>
                </table>
            </div>

        </main>


    </section>



  






    <script>
        document.querySelector('#deletecategory').addEventListener('click', function() {
            let categoryID = this.value;
            document.querySelector('#category_id').value = categoryID;

            document.querySelector('#deleteform').submit();
        })
    </script>
</body>

</html>