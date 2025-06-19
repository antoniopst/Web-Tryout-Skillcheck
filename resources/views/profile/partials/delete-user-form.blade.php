<section x-data="{ confirmingUserDeletion: false }">
    <button @click="confirmingUserDeletion = true"
        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-md transition">
        Delete Account
    </button>

    <!-- Modal -->
    <div x-show="confirmingUserDeletion" x-transition x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="confirmingUserDeletion = false"
            class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg relative">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="text-lg font-semibold text-gray-900">Are you sure?</h2>

                <p class="mt-2 text-sm text-gray-600">
                    Once your account is deleted, all of its data will be permanently gone. Enter your password to confirm.
                </p>

                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 bg-white text-gray-800"
                        placeholder="Enter your password" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" @click="confirmingUserDeletion = false"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow transition">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
