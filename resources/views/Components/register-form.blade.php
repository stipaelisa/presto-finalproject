<form method="POST" action="{{route('register')}}">
    @csrf
    <div class="mb-3">
        <label  class="form-label">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
        @error('name')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    <div class="form-text text-danger">Inserisci il tuo nome</div>
    </div>
    <div class="mb-3">
        <label  class="form-label">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
        @error('email')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    <div class="form-text text-danger">Inserisci la tua email</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Conferma Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
        @error('password_confirmation')
            <div class="text-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-custom1">Registrati</button>
    
    </div>
    
</form>
<p class='text-end'>Hai già un account? <a class="text-decoration-none text-reset " href="{{ route('login')}}"><button class="btn btn-custom1">Accedi</button></a></p>