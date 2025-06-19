<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <div>
        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
        <input id="current_password" name="current_password" type="password" autocomplete="current-password"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200 bg-white text-gray-800" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500 text-sm" />
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
        <input id="password" name="password" type="password" autocomplete="new-password"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200 bg-white text-gray-800" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500 text-sm" />
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-200 bg-white text-gray-800" />
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
    </div>

    <div class="flex items-center gap-4">
        <button type="submit"
            class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold rounded-lg shadow-md transition">
            Save
        </button>

        @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-teal-600">
                Saved.
            </p>
        @endif
    </div>
</form>
