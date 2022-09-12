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


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Cous
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Montan restan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Vercement
                    </th>
                    <th scope="col" class="py-3 px-6">
                        NOM Client
                    </th>
                    <th scope="col" class="py-3 px-6">
                       Entyreprisee
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="font-bold ">
                            {{ $user->nom }}

                        </span>
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="font-bold ">
                            {{ $user->prenom }}
                        </span>
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="font-bold ">
                            {{ $user->email }}

                        </span>
                    </th>
                    {{-- <td class="py-4 px-6">
                        <a
                        href="{{ route('edit',['id'=>$vercement->email]) }}"
                            class="mx-1  px-2 font-medium text-blue-600 dark:text-blue-500  ring-1 ring-blue-600">
                            edit
                    </a>
                    <form class="inline" action="{{ route('destroy',['client'=>$vercement->email]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete"
                        class="mx-1 px-2  inline font-medium text-red-600 dark:text-red-500  ring-1 ring-red-600">
                </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-5 px-2  md:px-20">
            {{
            $users->links()
            }}
        </div>
    </div>
</x-app-layout>
