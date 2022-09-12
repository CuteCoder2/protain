<x-app-layout>
    <div class="container">
        <div class="p-6 space-y-6">
            <form action="{{ route('updateservice') }}" method="POST" class="block w-full">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_service" value="{{ $services->id_service }}" >
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type Servie</label>
                    <input type="text"
                    name="service_type"
                    value="{{ $services->type_service }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@flowbite.com" required>

                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                    <textarea id="message"
                    name="service_des"
                    rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your message...">
                        {{ $services->description }}</textarea>
                        <button type="submit"
                class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajoute</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
