<x-layout>
  <x-slot name="title">
    Nouveau compte
  </x-slot>
  <div class="signup">
    <div>
      <h1>Nouveau Compte</h1>
      <form action="/signup" method="POST">
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
          <input id="password" name="password" type="password" required />
          @error('password')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <div class="input-group">
          <label for="password_confirmation">Confirmez votre mot de passe</label>
          <input id="password_confirmation" name="password_confirmation" type="password" required />
          @error('password_confirmation')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <button class="cta">Créer un compte</button>

        <div>
          <p>Vous avez déjà un compte ?</p>
          <div><a href="/login">Connectez-vous</a></div>
        </div>
      </form>
    </div>
  </div>
</x-layout>
