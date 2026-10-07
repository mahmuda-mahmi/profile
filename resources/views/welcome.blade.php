<x-layout>
    <div class="card bg-base-100 shadow-xl w-full max-w-sm mx-auto mt-8">
        <div class="card-body justify-center items-center text-center">
            <h2 class="card-title">Get Started</h2>
            <p>Create and manage your profiles easily.</p>
            <div class="card-actions mt-4">
                <a href="{{ route('profile.create') }}" class="btn btn-primary">Create Profile</a>
                <a href="{{ route('profile.index') }}" class="btn btn-primary">
                    View Profiles
                </a>
            </div>
        </div>
    </div>
    <div>
    </div>
</x-layout>
