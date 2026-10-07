<x-layout>
        <div class="hero-content flex-col mx-auto mt-6">
            <div class="card bg-base-100 w-full max-w-sm shadow-2xl">
                <div class="card-body">
                    <h1 class="text-2xl font-bold mx-auto mb-4">Edit Profile</h1>
                    <form action="{{ route('profile.update', $profile) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input 
                            name="name"  
                            label="Name" 
                            placeholder="Enter your name"
                            :value="$profile->name ?? ''" 
                            />
                        <x-input 
                            name="email" 
                            label="Email" 
                            type="email" 
                            placeholder="Enter your email" 
                            :value="$profile->email ?? ''"
                            />
                        <x-input 
                            name="phone" 
                            label="Phone" 
                            type="tel" 
                            :value="$profile->phone ?? ''" 
                            placeholder="Enter your phone number" 
                            />
                        <x-input 
                            name="dob"  
                            label="DOB" 
                            type="date" 
                            placeholder="Select your birthdate" 
                            :value="$profile->dob?->format('Y-m-d') ?? ''"
                            />
                        <div class="flex gap-2 mt-6 mx-auto">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href='{{ route('profile.index') }}' class="btn btn-secondary">Cancel</a>
                            <button type="submit" form="delete-profile-form" class="btn btn-error">Delete</button>
                        </div>
                    </form>
                    <form id="delete-profile-form" action="{{ route('profile.destroy', $profile) }}" method="POST" onsubmit="return confirm('Delete this profile? This cannot be undone.')">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
</x-layout>