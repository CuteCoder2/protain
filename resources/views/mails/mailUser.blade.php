<x-guest-layout>
    <div class="container h-screen w-screen flex justify-center items-center">
        <div class="bg-slate-400 p-4 text-gray-900">

            <p>
                Bonjour Mr/Mme
                {{ $commande->user->nom }}
                {{ $commande->user->prenom }}
            </p>
            <p>
                La commande  du cient de Mr/Mme
                {{ $commande->client->nom }}
                {{ $commande->client->prenom }}
                pour le service de 
                {{ $commande->service->type_service}}
                dois etre livre pour le
            </p>
            <p>
                <span class="text-2xl text-red-900 ">
                    {{ $commande->end }}
                </span>
            </p>
            <p>
                Veiller a accellere pour povoir livre a temps
            </p>
            <p>
                Ou relance le Client pour reprogramme une autre date de livration,et mettre a jour la date e livration
            </p>
            Bonne journee a vous
        </div>
        </div>
</x-guest-layout>