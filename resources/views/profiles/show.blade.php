<x-layout>
    <div class="min-h-screen">
        <div class="hero-content flex-col">
            <div class="card bg-base-100 w-full max-w-md shadow-2xl">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <h1 class="text-2xl font-bold mb-4">Profile Details</h1>

                    <div class="space-y-3">
                        <div>
                            <span class="font-semibold">ID:</span>
                            {{ $profile->id }}
                        </div>
                        <div>
                            <span class="font-semibold">Name:</span>
                            {{ $profile->name }}
                        </div>
                        <div>
                            <span class="font-semibold">Email:</span>
                            {{ $profile->email }}
                        </div>
                        <div>
                            <span class="font-semibold">Phone:</span>
                            {{ $profile->phone }}
                        </div>
                        <div>
                            <span class="font-semibold">DOB:</span>
                            {{ $profile->dob->format('d M Y') }}
                        </div>
                    </div>

                    <div class="flex gap-2 mt-6">
                        <a href="{{ route('profile.index') }}" class="btn btn-neutral">
                            ← Back to List
                        </a>
                        <a href="{{ route('profile.edit', $profile) }}" class="btn btn-outline">
                            Edit
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>