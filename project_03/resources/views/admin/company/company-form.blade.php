<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Company Info</h1>
                <form action=" {{ route('admin.company-store') }}" method="POST" class=" mx-auto" id="addCompanyInfo">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-3">
                                <label for="general" class="block text-gray-700 text-sm font-bold mb-2">General
                                    Info:</label>
                                <textarea id="general" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your general info..." name="general" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">
                                    Location:
                                </label>
                                <input type="text" id="location" name="location"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Location" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="hero_image">Image
                                    Upload:</label>
                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="hero_image" type="file" name="hero_image">
                            </div>
                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-3">
                                <label for="about_us" class="block text-gray-700 text-sm font-bold mb-2">About
                                    Us:</label>
                                <textarea id="about_us" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your about us info..." name="about_us" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact"
                                    class="block text-gray-700 text-sm font-bold mb-2">Contact:</label>
                                <textarea id="contact" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your contact info..." name="contact" required></textarea>
                            </div>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#addCompanyInfo').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.company-store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);

                        window.location.href = "{{ route('admin.company') }}";
                    },


                });
            });
        });
    </script>
</x-app-layout>
