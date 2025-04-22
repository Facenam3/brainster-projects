<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Speaker</h1>
                <form action="#" method="POST" class=" mx-auto" id="addSPeaker">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Full Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Full Name" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Photo
                                    Upload:</label>
                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="photo" type="file" name="photo">
                            </div>
                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio:</label>
                                <textarea id="bio" rows="6"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your bio here..." name="bio" required></textarea>
                            </div>

                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#addSPeaker').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.speaker-store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);

                        window.location.href = "{{ route('admin.speakers') }}";
                    },


                });
            });
        });
    </script>
</x-app-layout>
