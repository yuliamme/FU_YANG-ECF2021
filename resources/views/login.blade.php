<x-layout>
  <x-slot name="title">
    Connexion
  </x-slot>
  <div class="login">
    <div>
      <h1>Connexion</h1>
      <form action="/login" method="POST">
        @csrf
        <div class="input-group">
          <label for="username">Nom d'utilisateur</label>
          <input id="username" name="username" value="{{ old('username') }}" required />
          @error('username')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <div class="input-group">
          <label for="password">Mot de passe</label>
          <input id="password" name="password" type="password"/>
          @error('password')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <button class="cta">Se connecter</button>

        <div>
          <p>Vous n'avez pas encore de compte ?</p>
          <div><a href="/signup">Créez vous un compte</a></div>
        </div>
      </form>
    </div>
  </div>
</x-layout>
