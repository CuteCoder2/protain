<x-app-layout>
    <div class="container">
        <div class="container mx-auto my-5 px-3">
            @if (session('status'))

            @switch(session('status'))
            @case('created')
            @php
            $col = "blue";
            $msg = "Client added Succefully"
            @endphp
            @break

            @case('deleted')
            @php
            $col = "red";
            $msg = "Client deleted Succefully"
            @endphp
            @break
            @case('updated')
            @php
            $col = "green";
            $msg = "Client updated Succefully"
            @endphp
            @break

            @default

            @endswitch
            <x-alert :col="$col" :msg="$msg" />
            @endif
        </div>
    </div>
    <div class="container mx-auto mb-5">
        <!-- Modal toggle -->
        <button
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 t_btn dark:focus:ring-blue-800"
            type="button">
            Ajouter Un Service
        </button>
    </div>
    {{--
    {{ @dump($clients) }} --}}

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        type
                    </th>
                    <th scope="col" class="py-3 px-6">
                        description
                    </th>
                    <th scope="col" class="py-3 px-6">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($services as $service )
                <tr>
                    <td class="py-4 px-6">
                        {{ $service->type_service }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $service->description }}
                    </td>
                    <td class="py-4 px-6">

                        <a href="{{ route('editservice',['id'=>$service->id_service]) }}"
                            class="mx-1 px-2 font-medium text-blue-600 dark:text-blue-500  ring-1 ring-blue-600">
                            <i class="fa fa-edit text-xl font-blold"></i>
                            edit
                        </a>
                        <form class="inline" action="{{ route('destroyservice',['id'=>$service->id_service]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <span class=" mx-1 px-2 ring-1 ring-red-600 inline">
                                <input type="submit" value="delete"
                                class="font-medium text-red-600 dark:text-red-500  ">
                                <i class="fa fa-trash text-xl font-blold"></i>
                            </span>
                        </form>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>


    <div id="modalEl" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                    Ajouter un Service
                    </h3>
                    <button type="button"
                        class="t_btn text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="{{ route('storeservice') }}" method="POST" class="block w-full">
                        @csrf
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type Servie</label>
                            <input type="text"
                            name="service_type"
                            value="{{ old('service_type') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="quel service desire le client?" required>

                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                            <textarea id="message"
                            name="service_des"
                            value="{{ old('service_des') }}"
                            rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="decrivez le..."></textarea>
                                <button type="submit"
                        class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>



{{-- $table->string('');
$table->text('description');
$table->text('cout_service'); --}}
