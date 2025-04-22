{{-- <x-app-layout>
    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <h1 class="p-4 text-xl text-orange-500 font-medium ">Edit Blog</h1>
                    <input type="button" id="openModal" value="Add Paragraph"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                </div>

                <form id="addBlogForm" class="mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="blog_title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Blog Title:
                                </label>
                                <input type="text" id="blog_title" name="blog_title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Blog title" required
                                    value="{{ old('blog_title', $blog->blog_title) }}">
                            </div>

                            <div class="mb-4">
                                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Created by:
                                </label>
                                <select name="user_id" id="user_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    < <option disabled {{ old('user_id', $blog->user_id) ? '' : 'selected' }}>
                                        {{ $blog->user->name }} </option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <h2 class="text-lg font-medium mb-4">Paragraphs:</h2>
                            <div id="paragraphs-container">
                                @foreach ($paragraphs as $paragraph)
                                    <div class="paragraph-item mb-4">
                                        <h4 class="font-bold">{{ $paragraph->title }}</h4>
                                        <p>{{ $paragraph->content }}</p>
                                        <button type="button" class="edit-paragraph text-blue-500 hover:underline"
                                            data-title="{{ $paragraph->title }}"
                                            data-content="{{ $paragraph->content }}">
                                            Edit
                                        </button>
                                        <hr class="my-2">
                                    </div>
                                @endforeach
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
            let currentEditIndex = null;

            $('#openModal').on('click', function() {
                $('#paragraph_title').val('');
                $('#paragraph_content').val('');
                $('#paragraphModal').removeClass('hidden');
                currentEditIndex = null; // Reset edit index for adding new paragraph
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

                if (currentEditIndex !== null) {

                    const existingParagraph = $('#paragraphs-container .paragraph-item').eq(
                        currentEditIndex);
                    existingParagraph.find('h4').text(title);
                    existingParagraph.find('p').text(content);
                } else {

                    const paragraphHtml = `
                        <div class="paragraph-item mb-4">
                            <h4 class="font-bold">${title}</h4>
                            <p>${content}</p>
                            <button type="button" class="edit-paragraph text-blue-500 hover:underline" 
                                data-title="${title}" 
                                data-content="${content}">
                                Edit
                            </button>
                            <hr class="my-2">
                        </div>
                    `;
                    $('#paragraphs-container').append(paragraphHtml);
                }

                $('#paragraph_title').val('');
                $('#paragraph_content').val('');
                $('#paragraphModal').addClass('hidden');
            });

            // Edit paragraph event
            $(document).on('click', '.edit-paragraph', function() {
                const title = $(this).data('title');
                const content = $(this).data('content');

                $('#paragraph_title').val(title);
                $('#paragraph_content').val(content);
                $('#paragraphModal').removeClass('hidden');

                currentEditIndex = $(this).closest('.paragraph-item').index();
            });

            $('#addBlogForm').on('submit', function(e) {
                e.preventDefault();
                let blogId = {{ $blog->id }};
                let formData = $(this).serialize();
                const paragraphs = [];
                $('#paragraphs-container .paragraph-item').each(function() {
                    const title = $(this).find('h4').text();
                    const content = $(this).find('p').text();
                    paragraphs.push({
                        title,
                        content
                    });
                });

                formData += '&paragraphs=' + JSON.stringify(paragraphs);

                $.ajax({
                    url: `/admin/update-blog/${blogId}`,
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.href = "{{ route('admin.blogs') }}";
                    }
                });
            });
        });
    </script>
</x-app-layout> --}}
<x-app-layout>
    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <h1 class="p-4 text-xl text-orange-500 font-medium">Edit Blog</h1>
                    <input type="button" id="openModal" value="Add Paragraph"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                </div>

                <form id="addBlogForm" class="mx-auto" data-id="{{ $blog->id }}">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="blog_title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Blog Title:
                                </label>
                                <input type="text" id="blog_title" name="blog_title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Blog title" required
                                    value="{{ old('blog_title', $blog->blog_title) }}">
                            </div>

                            <div class="mb-4">
                                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Created by:
                                </label>
                                <select name="user_id" id="user_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{ $blog->user_id }}" selected>
                                        {{ $blog->user->name }}
                                        @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <h2 class="text-lg font-medium mb-4">Paragraphs:</h2>
                            <div id="paragraphs-container">
                                @foreach ($paragraphs as $paragraph)
                                    <div class="paragraph-item mb-4">
                                        <h4 class="font-bold">{{ $paragraph->title }}</h4>
                                        <p>{{ $paragraph->content }}</p>
                                        <button type="button" class="edit-paragraph text-blue-500 hover:underline"
                                            data-title="{{ $paragraph->title }}"
                                            data-content="{{ $paragraph->content }}">
                                            Edit
                                        </button>
                                        <hr class="my-2">
                                    </div>
                                @endforeach
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
            let currentEditIndex = null;

            $('#openModal').on('click', function() {
                $('#paragraph_title').val('');
                $('#paragraph_content').val('');
                $('#paragraphModal').removeClass('hidden');
                currentEditIndex = null; // Reset edit index for adding new paragraph
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

                if (currentEditIndex !== null) {
                    const existingParagraph = $('#paragraphs-container .paragraph-item').eq(
                        currentEditIndex);
                    existingParagraph.find('h4').text(title);
                    existingParagraph.find('p').text(content);
                } else {
                    const paragraphHtml = `
                        <div class="paragraph-item mb-4">
                            <h4 class="font-bold">${title}</h4>
                            <p>${content}</p>
                            <button type="button" class="edit-paragraph text-blue-500 hover:underline" 
                                data-title="${title}" 
                                data-content="${content}">
                                Edit
                            </button>
                            <hr class="my-2">
                        </div>
                    `;
                    $('#paragraphs-container').append(paragraphHtml);
                }

                $('#paragraph_title').val('');
                $('#paragraph_content').val('');
                $('#paragraphModal').addClass('hidden');
            });

            $(document).on('click', '.edit-paragraph', function() {
                const title = $(this).data('title');
                const content = $(this).data('content');

                $('#paragraph_title').val(title);
                $('#paragraph_content').val(content);
                $('#paragraphModal').removeClass('hidden');

                currentEditIndex = $(this).closest('.paragraph-item').index();
            });

            $('#addBlogForm').on('submit', function(e) {
                e.preventDefault();
                let blogId = $(this).data('id');
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


                paragraphs.forEach((para, index) => {
                    formData.push({
                        name: `paragraphs[${index}][title]`,
                        value: para.title
                    });
                    formData.push({
                        name: `paragraphs[${index}][content]`,
                        value: para.content
                    });
                });

                $.ajax({
                    url: `/admin/update-blog/${blogId}`,
                    type: 'POST',
                    data: $.param(formData),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.href = "{{ route('admin.blogs') }}";
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

        });
    </script>
</x-app-layout>
