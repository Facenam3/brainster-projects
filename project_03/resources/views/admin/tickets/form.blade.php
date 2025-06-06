<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Ticket</h1>
                <form action="{{ route('admin.ticket-store') }}" method="POST" class=" mx-auto" id="addTicket">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                                    Price:
                                </label>
                                <input type="text" id="price" name="price"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Price" required>
                            </div>


                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#addTicket').on('submit', function(e) {
                e.preventDefault();


                $.ajax({
                    url: "{{ route('admin.ticket-store') }}",
                    type: "POST",
                    data: $('#addTicket').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);
                        window.location.href = "{{ route('admin.tickets') }}";
                    },


                });
            });
        });
    </script>
</x-app-layout>
