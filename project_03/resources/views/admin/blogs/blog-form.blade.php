<x-app-layout>
    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Blog</h1>
                    <input type="button" id="openModal" value="Add Paragraph"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                </div>

                <form id="addBlogForm" class="mx-auto">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="blog_title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Blog Title:
                                </label>
                                <input type="text" id="blog_title" name="blog_title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Blog title" required>
                            </div>

                            <div class="mb-4">
                                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Created by:
                                </label>
                                <select name="user_id" id="user_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select a user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <h2 class="text-lg font-medium mb-4">Paragraphs:</h2>
                            <div id="paragraphs-container">

                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Submit Blog"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                </form>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="paragraphModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-lg w-11/12 md:w-1/3">
            <h3 class="text-lg font-medium mb-4">Add Paragraph</h3>
            <div class="mb-4">
                <label for="paragraph_title" class="block text-gray-700 text-sm mb-1">Paragraph Title:</label>
                <input type="text" id="paragraph_title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                    placeholder="Paragraph title">
            </div>

            <div class="mb-4">
                <label for="paragraph_content" class="block text-gray-700 text-sm mb-1">Paragraph Content:</label>
                <textarea id="paragraph_content"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                    placeholder="Write paragraph content..." rows="4"></textarea>
            </div>

            <button id="saveParagraph" class="bg-blue-500 text-white px-4 py-2 rounded">Save Paragraph</button>
            <button id="closeModal" class="bg-gray-300 text-gray-700 px-4 py-2 rounded ml-2">Cancel</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let paragraphCount = 0;

            $('#openModal').on('click', function() {
                $('#paragraphModal').removeClass('hidden');
            });

            $('#closeModal').on('click', function() {
                $('#paragraphModal').addClass('hidden');
            });

            $('#saveParagraph').on('click', function() {
                const title = $('#paragraph_title').val();
                const content = $('#paragraph_content').val();

                if (content.trim() === "") {
                    alert('Paragraph content is required!');
                    return;
                }

                const paragraphHtml = `
                    <div class="paragraph-item mb-4">
                        <h4 class="font-bold">${title}</h4>
                        <p>${content}</p>
                    </div>
                `;

                $('#paragraphs-container').append(paragraphHtml);
                paragraphCount++;

                $('#paragraph_title').val('');
                $('#paragraph_content').val('');
                $('#paragraphModal').addClass('hidden');
            });


            $('#addBlogForm').on('submit', function(e) {
                e.preventDefault();

                let formData = $(this).serializeArray();
                const paragraphs = [];

                $('#paragraphs-container .paragraph-item').each(function() {
                    const title = $(this).find('h4').text();
                    const content = $(this).find('p').text();

                    paragraphs.push({
                        title: title,
                        content: content
                    });
                });


                formData.push({
                    name: 'paragraphs',
                    value: JSON.stringify(paragraphs)
                });


                $.ajax({
                    url: "{{ route('admin.blog-store') }}",
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Blog created successfully!');
                        window.location.href = "{{ route('admin.blogs') }}";
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</x-app-layout>
