<x-layout>
    <div class="card w-96 bg-base-100 shadow-sm mb-6 mx-auto mt-4">
        <div class="card-body w-full justify-center items-center">
            @if (session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <div class="flex justify-between">
                <h2 class="text-2xl font-bold">Register a New Profile</h2>
            </div>
            <div class="mt-6">
                <a href="/profile/create" class="btn btn-primary">Create Now</a>
            </div>
        </div>
    </div>
    
    <div class="mb-6">
    </div>
    <div class="overflow-x-auto w-3/4 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Registered Profiles</h1>

        <table class="table table-zebra">
            <!-- head -->
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Phone No.</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            @forelse($profiles as $profile)
                <tr>
                    <th>{{ $profile->id }}</th>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->email }}</td>
                    <td>{{ $profile->dob->format('d M Y') }}</td>
                    <td>{{ $profile->phone }}</td>
                    <td>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $profile) }}" class="btn btn-sm btn-outline">View</a>
                            <a href="{{ route('profile.edit', $profile) }}" class="btn btn-sm btn-outline">Edit</a>
                            <form action="{{ route('profile.destroy', $profile) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this profile?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center opacity-60 py-6">
                        No profiles yet. Click "Add Profile" to create one.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-layout>