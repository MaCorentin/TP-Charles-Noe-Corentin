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
            <a class="navbar-brand" href="#page-top">Tp De BRICE</a>
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
        <h1><strong>{{$categorie->name}}</strong></h1>
        @foreach($articles as $article)
            @if($article->CategoryID == $categorie->id)
            <a href="{{route("selectArticle",["id"=>$article->id])}}"><p>Nom de l'article : {{$article->name}} <br/>Description : {{$article->description}}<br/> <br/></p></a>
            @endif
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
