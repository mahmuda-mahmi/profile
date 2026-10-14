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
                <a href="/profile/create" class="btn btn-primary ">Create Now</a>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto print:overflow-visible w-11/12 print:w-full mx-auto">
        <div class="flex justify-between items-center mb-4 w-11/12">
            <h1 class="text-3xl font-bold mb-6">Registered Profiles</h1>
            <button type="button" onclick="printStateDiv('table_print')"
                    class="btn btn-outline-dark">
                Print
            </button>
        </div>
        <div id="table_print">
            <table class="table table-zebra print:table-fixed print:w-full">
                <!-- head -->
                <thead>
                <tr>
                    <th>SER.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Phone No.</th>
                    <th class="no-print">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!-- row 1 -->
                @php
                    $i = ($profiles->currentPage() - 1) * $profiles->perPage() + 1;
                @endphp
                @forelse($profiles as $profile)
                    <tr>
                        <td class="whitespace-nowrap">{{ $i++ }}</td>
                        <td class="whitespace-nowrap">{{ $profile->name }}</td>
                        <td class="whitespace-nowrap">{{ $profile->email }}</td>
                        <td class="whitespace-nowrap">{{ $profile->dob->format('d M Y') }}</td>
                        <td class="whitespace-nowrap">{{ $profile->phone }}</td>
                        <td class="no-print">
                            <div class="flex gap-2">
                                <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-sm btn-outline ">View</a>
                                <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-sm btn-outline ">Edit</a>
                                <a href="javascript:void(0);"
                                    onclick="openConfirm('{{ route('profile.destroy', $profile->id) }}')"
                                    class="btn btn-sm btn-outline">
                                    Delete
                                </a>
                                <div>
                                    <dialog id="confirm_modal" class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Do you want to delete this profile?</h3>
                                            <div class="modal-action">
                                                <form action="" method="POST" class="flex gap-2" id="delete-profile-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="button" onclick="document.getElementById('confirm_modal').close()">Cancel</button>
                                                    <button class="btn btn-primary" type="submit">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>
                                </div>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center opacity-60 py-6 ">
                            No profiles yet. Click "Add Profile" to create one.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="my-6 overflow-x-auto w-1/3 mx-auto flex justify-center no-print"> 
        {{ $profiles->links() }}
    </div>

    @push('scripts')
        <script>
            function printStateDiv(divId){
                var printContent = document.getElementById(divId).innerHTML;
                var w = window.open();
                w.document.write('<style>body {.no-print{display:none} font-family: sans-serif; padding: 20px; }table { width: 100%; border-collapse: collapse; }th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }</style>');
                w.document.write('<h1 class="text-2xl font-bold mb-4">Registered Profiles Report</h1>');
                w.document.write('<p class="text-sm text-gray-600 mb-6">Generated on ' + new Date().toLocaleString() + '</p>');
                w.document.write(printContent);
                w.print();
                w.close();
            }

            const confirmModal = document.getElementById('confirm_modal');

            function openConfirm(url) {
                let form = document.getElementById('delete-profile-form');
                form.action = url;
                confirmModal.showModal();
            }
        </script>
    @endpush
</x-layout>

