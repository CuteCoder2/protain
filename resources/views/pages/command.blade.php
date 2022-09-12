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
        @if ($errors)

        <p class="text-red-500 my-3 font-bold text-xl">{{ $errors->first('client_email') }}
        </p>
        @endif
        <!-- Modal toggle -->
        <button
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 t_btn dark:focus:ring-blue-800"
            type="button">
            Ajoute Un Service
        </button>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        date debut et fin
                    </th>
                    <th scope="col" class="py-3 px-6">
                        cout
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Reste
                    </th>
                    <th scope="col" class="py-3 px-6">
                        status
                    </th>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        type de payement
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Client
                    </th>
                    <th scope="col" class="py-3 px-6">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($commands as $command )
                <tr class="font-medium text-center">
                    <td class="py-4 px-6">
                        {{ $command->start }}
                        {{ '-' }}
                        {{ $command->end }}
                    </td>
                    <td class="py-4 px-6">
                        {{$command->cout." XAF" }}
                    </td>
                    <td class="py-4 px-6">
                        {{$command->reste." XAF" }}
                    </td>
                    <td class="py-4 px-6">
                        @switch($command->status)
                        @case('0')
                        <span
                            class="p-1 rounded-md text-center text-lg text-white font-semibold bg-red-500 hover:brightness-150">
                            {{ 'Non-Solde' }}
                        </span>
                        @break
                        @case('1')
                        <span
                            class="p-1 rounded-md text-center text-lg text-white font-semibold bg-green-500 hover:brightness-150">
                            {{ 'Avance' }}
                        </span>
                        @break
                        @case('2')
                        <span
                            class="p-1 rounded-md text-center text-lg text-white font-semibold bg-blue-500 hover:brightness-150">
                            {{ 'solde' }}
                        </span>
                        @break
                        @endswitch
                    </td>
                    <td class="py-4 px-6">
                        @switch($command->type_comd)
                        @case('0')
                        <span class="p-1 rounded-md text-center text-lg text-white font-semibold">
                            {{ 'tranche' }}
                        </span>
                        @break
                        @case('1')
                        <span class="p-1 rounded-md text-center text-lg text-white bg-slate-400 font-semibold">
                            {{ 'tous' }}
                        </span>
                        @break
                        @endswitch

                    </td>
                    <td class="py-4 px-6">
                        {{ $command->client->nom }}
                        {{ $command->client->prenom }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('vercement',['id'=>$command->id_commande]) }}" class="mx-1 p-2 font-medium text-green-600 dark:text-green-500  ring-1 ring-green-600">payement
                            <i class="fa fa-money"></i>
                        </a>
                        <a href="{{ route('editcommande',['id'=>$command->id_commande]) }}"
                            class="mx-1 p-2 font-medium text-blue-600 dark:text-blue-500  ring-1 ring-blue-600">
                            <i class="fa fa-edit"></i>
                            edit
                        </a>
                        <form class="inline" action="{{ route('destroycommande',['id'=>$command->id_commande]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <span class="text-red-600 dark:text-red-500  ring-1 ring-red-600 mx-1 p-2">
                                <input type="submit" value="delete"
                                class="inline-block font-medium t">
                                <i class="fa fa-trash text-black"></i>
                            </span>
                        </form>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

        <div class="my-5 mx-3">
            {{ $commands->links() }}
        </div>
    </div>


    <div id="modalEl" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                        Commande
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
                    <form action="{{ route('storecommande') }}" method="POST" class="block w-full">
                        @csrf
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-Mail Client</label>
                            <input type="email" name="client_email" value="{{ old('client_email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" required>
                            @if ($errors)
                            <small class="text-red-500 my-3 font-bold text-sm">{{ $errors->first('client_email') }}
                            </small>
                            @endif
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cous</label>
                            <input type="number" name="cous" value="{{ old('cous') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="cout" required>
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Service</label>
                            <select name="service" id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">choisie</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id_service }}">{{ $service->type_service }}</option>
                                @endforeach
                            </select>

                            <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Date debute et Fin Project</label>
                            <div date-rangepicker class="flex items-center">
                                <div class="relative">
                                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                  </div>
                                  <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                  </div>
                                  <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                              </div>
                              </div>

                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Type
                                Payement</label>
                            <select name="type_comd" id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">choisie</option>
                                <option value="1">trancher</option>
                                <option value="1">Tous</option>
                            </select>

                            <button type="submit"
                                class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajoute</button>
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
