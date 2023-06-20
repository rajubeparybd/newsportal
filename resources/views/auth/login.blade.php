<x-guest-layout>
    <x-slot:title>
        <div class="text-center">
            <h4 class="text-uppercase mt-0">Sign In</h4>
        </div>
    </x-slot:title>

    <x-slot:links>
        <p>
            <a href="{{route("password.request")}}" class="text-muted ml-1">
                <i class="fa fa-lock mr-1"></i> Forgot your password?
            </a>
        </p>
        <p class="text-muted">
            Don't have an account?
            <a href="{{route("register")}}" class="text-dark ml-1">
                <b>Sign Up</b>
            </a>
        </p>
    </x-slot:links>

    <x-auth-session-status :status="session('status')"/>

    <form method="POST" action="{{route("login")}}">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{old('email')}}" required autofocus
                   autocomplete="username" id="email" placeholder="Enter your email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" required name="password"
                   id="password"
                   placeholder="Enter your password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                <label class="custom-control-label" for="remember">Remember me</label>
            </div>
        </div>

        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary btn-block" type="submit"> Log In</button>
        </div>

    </form>

</x-guest-layout>
