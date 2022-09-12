<x-guest-layout>
    <div class=" container-login">
        <div class="img relative">
            <img alt="login images" src="{{ url('images/pro log.png') }}" alt=" ">
            <span class="font-bold absolute text-orange50 text-5xl w-full bottom-44 text-center">
               Une Autre Vision Du Web...

            </span>
        </div>
        <div class="login-container ">
            <form action="{{ route('login') }}" method="POST">
                <div class="inline-block h-24 w-24 ">
                    <img alt="" class="h-full w-full rounded-full" src="{{ url('images/iconuser.png') }}" alt=" ">
                </div>
                @csrf
                <h2>BIENVENUE</h2>
                <!--<h1>PROTAI-IN</h1>-->
                <div class="input-div one ">
                    <div class="i ">
                        <img src="{{ asset('images/icone login.png')}}" alt="">
                    </div>
                    <div>
                        <h5>LOGIN</h5>
                        <input type="text" name="email" value="{{ old('email') }}" class="input ">
                    </div>
                </div>
                <div class="input-div two ">
                    <div class="i ">
                        <img src="{{ asset('images/cardena.png')}}" alt="">
                    </div>
                    <div>
                        <h5>Mot de passe</h5>
                        <input type="password" name="password" class="input ">
                    </div>
                </div>
                <div class="lien ">
                    <a href="{{ route('register') }}">cree un compte</a>
                </div>
                <input type="submit" class="btn " value="Connexion ">
            </form>
        </div>
    </div>

</x-guest-layout>
