<x-guest-layout>
    <x-slot:title>
        <div class="text-center">
            <h4 class="text-uppercase mt-0">Reset Password</h4>
        </div>
    </x-slot:title>
    
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{old('email', $request->email)}}" required
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

        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        </div>

    </form>

</x-guest-layout>
