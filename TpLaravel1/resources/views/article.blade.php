<?php


$user = Auth::user();
$IsAdmin = Auth::user()->IsAdmin;
$id = Auth::id();

?>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <nav class="row" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{route("dashboard")}}">Tp De BRICE</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <li class="nav-item mx-0 mx-lg-1" :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="">
                                {{ __('Déconnexion') }}
                            </a></li>
                    </form>
                    <?php if ($IsAdmin == 1): ?>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Admin</a></li>
                    <?php endif; ?>

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#categorie">categorie</a></li>
                    <?php if ($IsAdmin == 0): ?>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <br/>
    <div>
        <h1><strong>NOM DE L'ARTICLE : {{$article->name}}</strong></h1><p>Note : {{$MoyenneNote}}/5</p>
        <p>DESCRIPTION : {{$article->description}}</p>
        <form method="POST" action="{{route("commentairecreate")}}" style="background-color:#E02525;">
            @csrf
            <input type="text" name="cText" id="cText">
            <input type="hidden" name="nid" id="nid" value="{{$article->id}}">
            <button type="submit">VALIDER</button>
        </form>
        <form method="POST" action="{{route("notecreate")}}" style="background-color:#0dcaf0;">
            @csrf
            <select name="cnote" id="cnote">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <input type="hidden" name="nid" id="nid" value="{{$article->id}}">
                <button type="submit">VALIDER</button>
            </select>

        </form>
        @foreach ($commentaires as $commentaire)
            @foreach($users as $user)
                @if($article->id == $commentaire->ArticleID)
                    @if($user->id == $commentaire->UserID)

                        <p>Commentaire de  : {{$user->name}}</p>
                        <p class="d-inline">{{$commentaire->text}}</p>
                        @if(Auth::user()->IsAdmin == true)
                            <form action="{{route("deleteComm")}}" method="post">
                                @method("DELETE")
                                @csrf

                                <input type="hidden" value="{{$commentaire->id}}" name="idcom">
                                <button type="submit" style="border:solid;background-color: red;">Supprimer</button>

                            </form>
                        @endif
                    @endif
                @endif
            @endforeach

        @endforeach

    </div>
    <!-- Portfolio Section-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</x-app-layout>
