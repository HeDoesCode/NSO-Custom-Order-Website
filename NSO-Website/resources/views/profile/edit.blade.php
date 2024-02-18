<x-app-layout>
    <div class="col-span-10 p-5">
        <div class="ml-6">
            <p class="text-3xl font-bold mb-7">
                My Profile
            </p>
        </div>

        <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-4 bg-white shadow-md rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow-md rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow-md rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
