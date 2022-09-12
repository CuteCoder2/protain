<x-guest-layout>
    <div class="container h-screen w-screen flex justify-center items-center">
        <div class="bg-slate-400 p-4 text-gray-900">
            <p>
                <span class="text-sky-700 text-2xl">
                    Salut Mr/Mme
                </span>
                {{ $commande->client->nom }}
                {{ $commande->client->prenom }}
                votre commande de
                {{ $commande->service->type_service }}
                Seras prete le
                {{ $commande->end }}
                Nehiste pas a appele pour
                en savoir plus sur levolution
                du project,
                Merci et Bonne Jornne a vous
            </p>
            <span>
                appropos
            </span>
            <p>
                {{ $commande->service->description }}
            </p>
        </div>
    </div>
</x-guest-layout>