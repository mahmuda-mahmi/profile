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
            <td>{{ $profile->phone_no }}</td>
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