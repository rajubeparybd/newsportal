<x-guest-layout>
    <x-slot:title>
        <div class="mb-4">
            <h4 class="text-uppercase mt-0">Password Confirmation</h4>
        </div>
        <p class="text-muted font-14 mt-2">This is a secure area of the application. Please confirm your password before
            continuing.</p>
    </x-slot:title>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" required name="password"
                   id="password"
                   placeholder="Enter your password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary btn-block" type="submit">Confirm</button>
        </div>

    </form>

</x-guest-layout>
