<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Register
                    </h2>
                    <p class="mb-4">Create an account to post gigs</p>
                </header>

                <form action="/register" method="POST" novalidate>
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input type="text"
                            class="border border-gray-200 rounded p-2 w-full @error('name', 'reg_errors') border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" />

                        @error('name', 'reg_errors')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email"
                            class="border border-gray-200 rounded p-2 w-full @error('email', 'reg_errors') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" />

                        @error('email', 'reg_errors')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password"
                            class="border border-gray-200 rounded p-2 w-full @error('password', 'reg_errors') border-red-500 @enderror"
                            name="password" value="{{ old('password') }}" />

                        @error('password', 'reg_errors')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="inline-block text-lg mb-2">
                            Confirm Password
                        </label>
                        <input type="password"
                            class="border border-gray-200 rounded p-2 w-full @error('password_confirmation', 'reg_errors') border-red-500 @enderror"
                            name="password_confirmation" value="{{ old('password_confirmation') }}" />

                        @error('password_confirmation', 'reg_errors')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Sign Up
                        </button>
                    </div>

                    <div class="mt-8">
                        <p>
                            Already have an account?
                            <a href="login" class="text-laravel">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>

</x-layout>
