<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Anime Ranking' }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@700&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="/app.css" />

  </head>
  <body>
    <header class="topnav">
      <div class="inner">
        <nav>
          <a class="logo" href="/">Anime Ranking</a>
          <a href="/top">Top</a>
          <a href="/watchlist">Ma watchlist</a>
            <a href="/anime/create">Add Anime Film</a>
        </nav>

        <nav>
          @auth
                @if( $username = Auth::user()->username )@endif
                @if( $user_id = Auth::user()->id )@endif

                <div><a href="/user/{{ $user_id }}">{{ $username }}</a></div>

                <form action="/logout" method="POST">
                  @csrf
                  <button>Se déconnecter</button>
                </form>
          @endauth
          @guest
            <a href="/login">Se connecter</a>
            <a href="/signup">Créer un compte</a>
          @endguest

        </nav>
      </div>
    </header>
    <main>
      {{ $slot }}
    </main>
  </body>
</html>
