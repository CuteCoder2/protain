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
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" id="btn">
            Ajouter un Client
        </button>
    </div>
    {{--
    {{ @dump($clients) }} --}}

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nom
                    </th>
                    <th scope="col" class="py-3 px-6">
                        E-mail
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Company
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($clients as $client )
                <tr>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="font-bold ">
                            {{ Str::upper($client->nom) }}
                        </span>
                        {{ $client->prenom }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $client->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $client->nom_entre ?? 'NULL' }}
                    </td>
                    <td class="py-4 px-6">
                        <a
                        href="{{ route('edit',['id'=>$client->email]) }}"
                            class="mx-1  px-2 font-medium text-blue-600 dark:text-blue-500  ring-1 ring-blue-600">
                            edit
                    </a>
                    <form class="inline"
                     action="{{ route('destroyclient',['client'=>$client]) }}"
                      method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete"
                        class="mx-1 px-2  inline font-medium text-red-600 dark:text-red-500  ring-1 ring-red-600">
                </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-5 px-2  md:px-20">
            {{
            $clients->links()
            }}
        </div>
    </div>



    <div class="container mx-auto">
        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1"
            class="overflow-y-auto fixed hidden top-0 right-0 left-0 z-50 w-full md:inset-0  h-modal md:h-full justify-center items-center flex"
            >
    </div>

    <div id="modalEl" tabindex="-1" aria-hidden="true" aria-modal="true" role="dialog"
        class=" overflow-y-auto overflow-x-hidden hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                        Ajouter un Client
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close_client">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                        <form class=" w-full py-5" method="POST" action="{{ url('client')}}">
                            @csrf
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="email" name="email" id="floating_email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required="">
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address E-mail</label>
                            </div>
                            <div class="relative z-0  mt-2 mb-6 w-full group">
                                <input type="text" name="company" id="floating_company"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required="">
                                <label for="floating_company"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company<!--(Ex.
                                    Google)--></label>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="first_name" id="floating_first_name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required="">
                                    <label for="floating_first_name"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="last_name" id="floating_last_name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required="">
                                    <label for="floating_last_name"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prenom</label>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="tel" name="phone" id="floating_phone"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required="">
                                    <label for="floating_phone"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telephone<!--(+237)456-456-890--></label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="location" id="floating_password"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required="">
                                    <label for="floating_password"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Localisation</label>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
