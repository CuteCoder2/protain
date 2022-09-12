<x-app-layout>


    <div class="p-6 space-y-6">
        <form action="{{ route('updatecommande') }}" method="POST" class="block w-full">
            <input type="hidden" name="id" value="{{ $commandes->id_commande }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type
                    Servie</label>
                <input type="email" name="client_email" value="{{ $commandes->client->email }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required>
                @if ($errors)
                <small class="text-red-500 my-3 font-bold text-sm">{{ $errors->first('client_email') }}
                </small>
                @endif
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cout</label>
                <input type="text" name="cous" value="{{ $commandes->cout }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="cout" required>

                    <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Service</label>
                <select name="service" id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="">choisir</option>
                    @foreach ($services as $service)
                    <option {{ ($commandes->id_service === $service->id_service) ? 'selected' : '' }} value="{{ $service->id_service }}">{{ $service->type_service }}</option>
                    @endforeach
                </select>

                <button type="submit"
                    class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
            </div>
        </form>
    </div>
</x-app-layout>
