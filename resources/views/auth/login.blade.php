<x-guest-layout>
    <style>
        p{
            color: #493657
        },

    </style>
        <div class="row">
            <div class="col-md-5">
                <div class="container">
                     <div class="row justify-content-center my-5">
                        <div class="col-sm-12 col-md-8 col-lg-5 mt-5">
                            <img src="{{ url('assets/img/bg-3.png') }}" class="px-4 ml-20" />
                        </div>
                     </div>
                </div>
            </div>
        <div class="col-md-7 d-flex mt-5">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <div class="row justify-content-center mt-5 ">
                    <x-jet-authentication-card-logo />
                    <div class="h3 mt-4 ml-2 font-weight-bold">
                        <p>E-TOCOLOGIST</p>
                    </div>
                </div>
            </x-slot>

            <div class="card-body">
                <x-jet-validation-errors class="mb-3 rounded-0" />
                @if (session('status'))
                    <div class="alert alert-success mb-3 rounded-0" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <x-jet-label value="{{ __('Email') }}" />

                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" :value="old('email')" required />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>

                    <div class="form-group">
                        <x-jet-label value="{{ __('Password') }}" />

                        <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                    name="password" required autocomplete="current-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <label class="custom-control-label" for="remember_me">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            @if (Route::has('password.request'))
                                <a class="text-muted mr-3" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-jet-button>
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
            </div>
        </div>
</x-guest-layout>
