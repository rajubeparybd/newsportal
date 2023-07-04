<x-guest-layout>
    <x-slot:title>
        <div class="text-center">
            <h4 class="text-uppercase mt-0">Sign Up</h4>
        </div>
    </x-slot:title>

    <x-slot:links>
        <p class="text-muted">
            Already have account?
            <a href="{{route("login")}}" class="text-dark ml-1">
                <b>Sign In</b>
            </a>
        </p>
    </x-slot:links>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{old('name')}}" required autofocus
                   autocomplete="name" id="name" placeholder="Enter you name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{old('email')}}" required
                   autocomplete="username" id="email" placeholder="Enter you email">
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
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required
                   name="password_confirmation"
                   id="password"
                   placeholder="Enter your confirm password">
            @error('password_confirmation')
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
            <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
        </div>

    </form>

</x-guest-layout>
