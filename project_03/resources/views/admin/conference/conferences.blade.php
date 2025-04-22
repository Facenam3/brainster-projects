<x-app-layout>

    <main class="flex p-6 ">
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-between align-center">
                    <h1 class="p-4 text-xl text-orange-500 font-medium ">Conference</h1>
                    <a href="{{ route('admin.conference-form') }}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Add
                        new Conference</a>
                </div>

                <div class="body  border border-gray-400 rounded-md mt-3">
                    <form method="GET" action="#" class="p-4 bg-white rounded-md">
                        <input type="text" name="search" class="rounded-md mx-2" placeholder="Search conferences..."
                            value="{{ request()->query('search') }}">
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                    </form>
                    <table class="w-full text-lg text-left rounded-md table-fixed">
                        <thead class="text-md text-white capitalize bg-orange-500 font-medium rounded-md">
                            <tr>
                                <th class="px-6 py-3">
                                    Title
                                </th>
                                <th class="px-6 py-3">
                                    Speaker
                                </th>
                                <th class="px-6 py-3">
                                    Date
                                </th>
                                <th class="px-6 py-3">
                                    Location
                                </th>
                                <th class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($conferences)
                                @foreach ($conferences as $conference)
                                    <tr class="border-b-2">
                                        <td class="px-6 py-3 "> {{ $conference->title }}</td>
                                        <td class="px-6 py-2">
                                            {{ $conference->speaker ? $conference->speaker->name : 'No Speaker' }}
                                        </td>
                                        <td class="px-6 py-3 "> {{ $conference->date }}</td>
                                        <td class="px-6 py-3 "> {{ $conference->location }}</td>
                                        <td>
                                            <a href="#" data-id="{{ $conference->id }}" class="text-blue-600 mx-2"
                                                id='edit'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>

                                            <a href="#" data-id="{{ $conference->id }}" class="text-red-600"
                                                id="delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="flex justify-between items-center mx-3 my-3">
                        <div>
                            Showing {{ $conferences->firstItem() }} to {{ $conferences->lastItem() }} of
                            {{ $conferences->total() }}
                            conferences
                        </div>
                        <div>
                            {{ $conferences->links('pagination.conferences') }}
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <script>
        $(document).on('click', '#edit', function(e) {
            e.preventDefault();

            const conferenceId = $(this).data('id');
            window.location.href = `/admin/conference-edit/${conferenceId}`;
        });

        $(document).on('click', '#delete', function(e) {
            e.preventDefault();

            const conferenceId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/conference-delete/' + conferenceId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Blog has been deleted.',
                                'success'
                            );
                            window.location.href = "{{ route('admin.conferences') }}";


                        },
                        error: function(xhr) {
                            window.location.href = "{{ route('admin.conferences') }}";
                        }
                    });
                }
            });

        });
    </script>
</x-app-layout>
