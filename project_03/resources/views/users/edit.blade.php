<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create User</h1>
                <form action="{{ route('admin.update-user', $user->id) }}" method="POST" class=" mx-auto" id="updateUser">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    First Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="First Name" required value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                    Email:
                                </label>
                                <input type="email" id="email" name="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Email" required value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Title:
                                </label>
                                <input type="text" id="title" name="title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Title" required value="{{ old('title', $user->title) }}">
                            </div>
                            <div class="mb-4">
                                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">
                                    City:
                                </label>
                                <input type="text" id="city" name="city"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="City" required value="{{ old('city', $user->city) }}">
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio:</label>
                                <textarea id="bio" rows="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your bio here..." name="bio" required>{{ old('bio', $user->bio) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="profile_picture">Photo
                                    Upload:</label>
                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="profile_picture" type="file" name="profile_picture"
                                    value="{{ old('profile_picture', $user->profile_picture) }}">
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
                                    placeholder="Last Name" required value="{{ old('surname', $user->surname) }}">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                    Password:
                                </label>
                                <input type="password" id="password" name="password"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Password" required value="{{ old('password', $user->password) }}">
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                                    Phone:
                                </label>
                                <input type="text" id="phone" name="phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Phone" required value="{{ old('phone', $user->phone) }}">
                            </div>
                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">
                                    Country:
                                </label>
                                <input type="text" id="country" name="country"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Country" required value="{{ old('country', $user->country) }}">
                            </div>


                            <div class="mb-4">
                                <label for="userType" class="block text-gray-700 text-sm font-bold mb-2">
                                    UserType:
                                </label>
                                <select id="userType" name="userType"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option disabled {{ old('userType', $user->userType) ? '' : 'selected' }}>Choose a
                                        user type</option>
                                    <option value="admin"
                                        {{ old('userType', $user->userType) == 'admin' ? 'selected' : '' }}>admin
                                    </option>
                                    <option value="user"
                                        {{ old('userType', $user->userType) == 'user' ? 'selected' : '' }}>user
                                    </option>

                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cv_upload">Cv
                                    Upload</label>
                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="cv_upload" type="file" name="cv_upload"
                                    value="{{ old('cv_upload', $user->cv_upload) }}">
                            </div>

                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>
</x-app-layout>
