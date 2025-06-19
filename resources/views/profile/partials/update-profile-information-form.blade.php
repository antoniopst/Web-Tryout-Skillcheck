<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input id="name" name="name" type="text"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200 bg-white text-gray-800"
            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
        <x-input-error class="mt-2 text-red-500 text-sm" :messages="$errors->get('name')" />
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" name="email" type="email"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200 bg-white text-gray-800"
            value="{{ old('email', $user->email) }}" required autocomplete="username" />
        <x-input-error class="mt-2 text-red-500 text-sm" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2 text-sm text-gray-700">
                Your email address is unverified.
                <button form="send-verification" class="ml-1 underline text-teal-600 hover:text-teal-800">
                    Click here to re-send the verification email.
                </button>
                @if (session('status') === 'verification-link-sent')
                    <p class="mt-1 text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div class="flex items-center gap-4">
        <button type="submit"
            class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold rounded-lg shadow-md transition">
            Save
        </button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-teal-600">
                Saved.
            </p>
        @endif
    </div>
</form>
