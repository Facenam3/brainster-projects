<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Comment</h1>
                <form action="{{ route('admin.comment-update', $comment->id) }}" method="POST" class=" mx-auto"
                    id="addComment">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    User:
                                </label>
                                <select name="user_id" id="user_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled {{ old('user_id', $comment->user_id) ? '' : 'selected' }}>
                                        Choose
                                        a
                                        speaker</option>

                                    @if ($users)
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} </option>
                                        @endforeach

                                    @endif

                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="blog_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Blog:
                                </label>
                                <select name="blog_id" id="blog_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled {{ old('blog_id', $comment->blog_id) ? '' : 'selected' }}>
                                        Choose
                                        a
                                        speaker</option>

                                    @if ($blogs)
                                        @foreach ($blogs as $blog)
                                            <option value="{{ $blog->id }}">{{ $blog->blog_title }} </option>
                                        @endforeach

                                    @endif

                                </select>
                            </div>

                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-3">
                                <label for="comment_body"
                                    class="block text-gray-700 text-sm font-bold mb-2">Comment:</label>
                                <textarea id="comment_body" rows="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Leave your comment here..." name="comment_body" required>{{ old('comment_body', $comment->comment_body) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Comment:
                                </label>
                                <select name="parent_id" id="parent_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled {{ old('parent_id', $comment->parent_id) ? '' : 'selected' }}>
                                        Choose
                                        a
                                        speaker</option>
                                    @if ($comments)
                                        @foreach ($comments as $comment)
                                            <option value="{{ $comment->id }}">{{ $comment->comment_body }} </option>
                                        @endforeach

                                    @endif

                                </select>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
    </main>

</x-app-layout>
