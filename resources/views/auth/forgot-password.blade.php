<x-guest-layout>
    <x-slot:title>
        <div class="text-center">
            <h4 class="text-uppercase mt-0 mb-3">Forget Password</h4>
            <p class="text-muted mb-0 font-13">Enter your email address and we'll send you an email with instructions to
                reset your password. </p>
        </div>
    </x-slot:title>

    <x-slot:links>
        <p class="text-muted">
            Back to
            <a href="{{route("login")}}" class="text-dark ml-1">
                <b>Sign In</b>
            </a>
        </p>
    </x-slot:links>

    <x-auth-session-status :status="session('status')"/>

    <form method="POST" action="{{route("password.email")}}">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{old('email')}}" required
                   autocomplete="username" id="email" placeholder="Enter you email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary btn-block" type="submit">Email Password Reset Link</button>
        </div>

    </form>

</x-guest-layout>
