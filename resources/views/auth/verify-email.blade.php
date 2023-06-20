<x-guest-layout>
    <x-slot:title>
        <div class="mb-4">
            <h4 class="text-uppercase mt-0">Confirm Email</h4>
        </div>
        <img src="{{asset('backend/images/mail_confirm.png')}}" alt="img" width="86" class="mx-auto d-block"/>

        <p class="text-muted font-14 mt-2"> A email has been send to <b>youremail@domain.com</b>.
            Please check for an email from company and click on the included link to
            reset your password. </p>
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="form-group mb-2 text-center">
                        <button class="btn btn-primary btn-block" type="submit">Resend Email</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="form-group mb-2 text-center">
                        <button class="btn btn-outline-danger btn-block" type="submit">Log Out</button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot:title>

    <a href="/" class="btn btn-block btn-pink waves-effect waves-light mt-1">Back to Home</a>

</x-guest-layout>
