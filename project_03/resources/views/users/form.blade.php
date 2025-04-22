<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create User</h1>
                <form action="{{ route('admin.user-store') }}" method="POST" class=" mx-auto" id="addUser">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    First Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="First Name" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                    Email:
                                </label>
                                <input type="email" id="email" name="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Title:
                                </label>
                                <input type="text" id="title" name="title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Title" required>
                            </div>
                            <div class="mb-4">
                                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">
                                    City:
                                </label>
                                <input type="text" id="city" name="city"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="City" required>
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio:</label>
                                <textarea id="bio" rows="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your bio here..." name="bio" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="profile_picture">Photo
                                    Upload:</label>
                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="profile_picture" type="file" name="profile_picture">
                            </div>
                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="surname" class="block text-gray-700 text-sm font-bold mb-2">
                                    Last Name:
                                </label>
                                <input type="text" id="surname" name="surname"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Last Name" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                    Password:
                                </label>
                                <input type="password" id="password" name="password"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Password" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                                    Phone:
                                </label>
                                <input type="text" id="phone" name="phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Phone" required>
                            </div>
                            <div class="mb-4">
                                <label for="country_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Country:
                                </label>
                                <select name="country_id" id="country_id"
                                    @foreach ($countries as $country)
                                    
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="{{ $country['id'] }}">{{ $country['name'] }}</option> @endforeach
                                    </select>
                            </div>


                            <div class="mb-4">
                                <label for="userType" class="block text-gray-700 text-sm font-bold mb-2">
                                    UserType:
                                </label>
                                <select id="userType" name="userType"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option selected disabled>Choose an user type</option>
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cv_upload">Cv
                                    Upload</label>
                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="cv_upload" type="file" name="cv_upload">
                            </div>

                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#addUser').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.user-store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);

                        window.location.href = "{{ route('admin.users') }}";
                    },


                });
            });
        });
    </script>
</x-app-layout>
