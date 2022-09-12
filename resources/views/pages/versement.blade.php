<x-app-layout>

    <div class="container">
        <div>
            <p class="flex justify-between px-10">
                Nom Client
                <span class="font-bold text-lg text-slate-600">
                    {{ $commande->client->nom }}
                    {{ $commande->client->prenom }}
                </span>
            </p>
            <p class="flex justify-between px-10">
                Dureé
                <span class="font-bold text-lg text-slate-600">
                    {{ $commande->start }}
                    <span class="text-black mx-4">
                        à
                    </span>
                    {{ $commande->start }}
                </span>
            </p>
            <p class="flex justify-between px-10">
                Entreprice
                <span class="font-bold text-lg text-slate-600">
                    {{ $commande->client->nom_entre }}
                </span>
            </p>
            </p>
            <p class="flex justify-between px-10">
                Tel Client
                <span class="font-bold text-lg text-slate-600">
                    <a class="text-blue-500 text-xl inline-block" href="tel:
                    {{ $commande->client->tel }}
                    ">
                        <i class="fa fa-phone  "></i>
                        {{ $commande->client->tel }}
                    </a>
                </span>
            </p>
            <p class="flex justify-between px-10">
                Service
                <span class="font-bold text-lg text-slate-600">
                    {{ $commande->service->type_service}}
                </span>
            </p>
            <p class="flex justify-between px-10">
                Montant Restan
                <span class="font-bold text-lg text-slate-600">
                    {{ $commande->reste}}
                    XAF
                </span>
            </p>
        </div>

        <br>
        <div class="text-4xl text-center font-bold">
            Enregistre Versement
        </div>
        <form class="inline" method="post" action="{{ route('storevercement') }}">
            @csrf
            <div class="mb-6">
                <input type="hidden" value="{{ $commande->id_commande }}" name='id_commande'>
                <label for="xaf" class="block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-300">Versement du Client</label>
                <input type="number" name="montan"
                id="xaf"
                value="{{ old('montan') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="****** XAF" required="">
                @error('msg')
                <span class="text-red-600 text-sm font-bold">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</x-app-layout>
