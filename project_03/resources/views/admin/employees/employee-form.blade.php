<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Employee</h1>
                <form action="{{ route('admin.employee-store') }}" method="POST" class=" mx-auto" id="addEmployee">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="full_name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Full Name:
                                </label>
                                <input type="text" id="full_name" name="full_name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Full Name" required>
                            </div>

                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Title:
                                </label>
                                <input type="text" id="title" name="title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Title" required>
                            </div>
                            <div class="mb-4">
                                <label for="company_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Company:
                                </label>
                                <select name="company_id" id="company_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select company</option>

                                    @if ($companies)
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->id }}</option>
                                        @endforeach

                                    @endif
                                </select>
                            </div>

                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#addEmployee').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.employee-store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);

                        window.location.href = "{{ route('admin.employees') }}";
                    },


                });
            });
        });
    </script>
</x-app-layout>
