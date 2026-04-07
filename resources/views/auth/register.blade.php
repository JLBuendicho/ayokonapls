<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-10rem)] bg-base-200 px-4 py-10">
        <div class="hero-content w-full max-w-md">
            <div class="card w-full rounded-3xl border border-base-300 bg-base-100 shadow-2xL">
                <div class="card-body p-8 sm:p-10">

                    <!-- Header -->
                    <div class="mb-8 text-center">
                        <h1 class="text-3xl font-bold">Create Account</h1>
                        <p class="mt-2 text-sm text-base-content/70">
                           Connect with people.
                        </p>
                    </div>

                    <form method="POST" action="/register" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div class="relative">
                            <label class="floating-label w-full">
                                <input type="text"
                                    name="name"
                                    placeholder="Enter your name"
                                    value="{{ old('name') }}"
                                    class="input input-bordered w-full border-base-content/60 @error('name') input-error @enderror"
                                    required>
                                <span>Name</span>
                            </label>
                            @error('name')
                                <p class="mt-2 text-sm text-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="relative">
                            <label class="floating-label w-full">
                                <input type="email"
                                    name="email"
                                    placeholder="Enter your email address"
                                    value="{{ old('email') }}"
                                    class="input input-bordered w-full @error('email') input-error @enderror"
                                    required>
                                <span>Email</span>
                            </label>
                            @error('email')
                                <p class="mt-2 text-sm text-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="relative">
                            <label class="floating-label w-full">
                                <input type="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    class="input input-bordered w-full @error('password') input-error @enderror"
                                    required>
                                <span>Password</span>
                            </label>
                            @error('password')
                                <p class="mt-2 text-sm text-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative">
                            <label class="floating-label w-full">
                                <input type="password"
                                    name="password_confirmation"
                                    placeholder="Re-enter your password"
                                    class="input input-bordered w-full"
                                    required>
                                <span>Confirm Password</span>
                            </label>
                        </div>

                        <!-- Button -->
                        <div class="pt-2 flex justify-center">
                            <button type="submit"
                                class="btn btn-primary w-1/2 rounded-xl transition hover:scale-[1.02]">
                                Create Account
                            </button>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="divider my-6 text-xs uppercase text-base-content/50">or</div>

                    <!-- Footer -->
                    <p class="text-center text-sm text-base-content/70">
                        Already have an account?
                        <a href="/login" class="link link-primary font-medium">Sign in</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</x-layout>