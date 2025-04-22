<x-app-layout>

    <main class="flex p-6 ">
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-between align-center">
                    <h1 class="p-4 text-xl text-orange-500 font-medium ">Badges</h1>
                    <a href="{{ route('admin.badge-form') }}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Add
                        new Badge</a>
                </div>

                <div class="body  border border-gray-400 rounded-md mt-3">
                    <form method="GET" action="#" class="p-4 bg-white rounded-md">
                        <input type="text" name="search" class="rounded-md mx-2" placeholder="Search tickets..."
                            value="{{ request()->query('search') }}">
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                    </form>
                    <table class="w-full text-lg text-left rounded-md table-fixed">
                        <thead class="text-md text-white capitalize bg-orange-500 font-medium rounded-md">
                            <tr>
                                <th class="px-6 py-3">
                                    Name
                                </th>
                                <th class="px-6 py-3">
                                    Photo
                                </th>
                                <th class="px-6 py-3">
                                    Description
                                </th>
                                <th></th>
                                <th class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($badges)
                                @foreach ($badges as $badge)
                                    <tr class="border-b-2">
                                        <td class="px-6 py-2">
                                            {{ $badge->name }}
                                        </td>
                                        <td class="px-6 py-3">
                                            <img width="75px" height="100px"
                                                src="{{ asset('storage/' . $badge->photo) }}"
                                                alt=" {{ $badge->name }}">
                                        </td>
                                        <td class="px-6 py-2">
                                            {{ Str::limit($badge->description, 15) }}
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="#" data-id="{{ $badge->id }}" class="text-blue-600 mx-2"
                                                id='edit'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>

                                            <a href="#" data-id="{{ $badge->id }}" class="text-red-600"
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
                            Showing {{ $badges->firstItem() }} to {{ $badges->lastItem() }} of {{ $badges->total() }}
                            badges
                        </div>
                        <div>
                            {{ $badges->links('pagination.badges') }}
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <script>
        $(document).on('click', '#edit', function(e) {
            e.preventDefault();

            const badgeId = $(this).data('id');
            window.location.href = `/admin/badge-edit/${badgeId}`;
        });

        $(document).on('click', '#delete', function(e) {
            e.preventDefault();

            const badgeId = $(this).data('id');
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
                        url: '/admin/badge-delete/' + badgeId,
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
                            window.location.href = "{{ route('admin.badges') }}";


                        },
                        error: function(xhr) {
                            window.location.href = "{{ route('admin.badges') }}";
                        }
                    });
                }
            });

        });
    </script>
</x-app-layout>
