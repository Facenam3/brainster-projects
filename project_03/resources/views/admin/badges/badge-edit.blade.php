<x-app-layout>
    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Уреди Беџ</h1>
                <form action="{{ route('admin.badge-update', $badge->id) }}" method="POST" class=" mx-auto" id="addBadge">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Badge Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Name" required value="{{ old('name', $badge->name) }}">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Badge
                                    Photo:</label>

                                <input
                                    class="shadow appearance-none border rounded-2 w-full py-2 px-2 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                                    id="photo" type="file" name="photo">
                                @if ($badge->photo)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($badge->photo) }}" alt="Selected Image"
                                            class="w-32 h-32 object-cover">
                                    </div>
                                @endif
                            </div>


                            <input type="submit" value="Додади"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-3">
                                <label for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2">Description:</label>

                                <textarea id="description" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Write your description info..." name="description" required> {{ old('name', $badge->description) }}</textarea>
                            </div>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>
</x-app-layout>
