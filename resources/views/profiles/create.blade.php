<x-layout>
        <div class="hero-content flex-col mx-auto mt-6">
            <div class="card bg-base-100 w-full max-w-sm shadow-2xl">
                <div class="card-body">
                    <h1 class="text-2xl font-bold mx-auto mb-4">Create Profile</h1>
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <x-input 
                            name="name"  
                            label="Name" 
                            placeholder="Enter your name"
                            />
                        <x-input 
                            name="email" 
                            label="Email" 
                            type="email" 
                            placeholder="Enter your email" 
                            />
                        <x-input 
                            name="phone" 
                            label="Phone" 
                            type="tel" 
                            placeholder="Enter your phone number" 
                            />
                        <x-input 
                            name="dob"  
                            label="DOB" 
                            type="date" 
                            placeholder="Select your birthdate" 
                            />
                        <button 
                            type="submit" 
                            class="btn btn-primary mt-4">
                            Create Profile
                        </button>
                    </form>
                </div>
            </div>
        </div>
</x-layout>