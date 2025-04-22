<x-app-layout>

    <main class="flex p-5 ">
        <div class="p-10">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="flex align-center">
                    <p class="font-small text-gray-800">Почетна</h1>
                        <span><i class="fa-solid fa-chevron-right mx-2"></i></span>
                    <p class="font-small text-gray-800">Блогови</p>
                    <span><i class="fa-solid fa-chevron-right mx-2"></i></span>
                    <p class="font-small text-orange-400">Блог Пост</p>
                </div>
                <div class="blogs mt-6">
                    <div class="blog-head w-50">
                        <h1 class="font-bold text-6xl w-2/3 ">{{ $blog->blog_title }}</h1>
                    </div>
                    <div class="blog-body w-2/3 mt-8">
                        <div class="text-xl ">
                            @if ($paragraphs)
                                @foreach ($paragraphs as $paragraph)
                                    <div class="paragraph-item mb-5">
                                        <h4 class="font-bold text-3xl">{{ $paragraph->title }}</h4>
                                        <p class="text-xl font-medium mt-5 text-gray-400">{{ $paragraph->content }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="flex items-center justify-between my-6 w-1/3">
                            <a href="#" class="flex items-center text-gray-600 hover:text-blue-500"
                                id="like-btn">
                                <i class="fa-regular fa-thumbs-up text-4xl mx-4"></i>
                            </a>
                            <a href="#" class="flex items-center text-gray-600 hover:text-blue-500"
                                id="heart-btn">
                                <i class="fa-regular fa-heart text-4xl mx-4"></i>
                            </a>
                            <a href="#" class="flex items-center text-gray-600 hover:text-blue-500"
                                id="comment-btn">
                                <i class="fa-regular fa-comment text-4xl mx-4"></i>
                            </a>
                        </div>
                        <div
                            class="share rounded-full w-full bg-orange-500 text-white p-3 flex justify-between items-center">
                            <p>Ти се допаѓа овој блог? Сподели го!</p>
                            <div class="social flex">
                                <div class="facebook">
                                    <a href="https://www.facebook.com/">
                                        <i class="fa-brands fa-square-facebook text-2xl mx-2"></i>
                                    </a>
                                </div>
                                <div class="twitter">
                                    <a href="https://x.com/">
                                        <i class="fa-brands fa-square-x-twitter text-2xl mx-2"></i>
                                    </a>
                                </div>
                                <div class="linkedin">
                                    <a href="https://www.linkedin.com/">
                                        <i class="fa-brands fa-linkedin text-2xl mx-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="comment w-full border rounded-xl border-4 border-orange-500 bg-white my-6 flex p-3">
                            <div class="w-1/5">
                                <img src="#" alt="">
                            </div>
                            <div class="w-4/5">
                                <form action="{{ route('user.comment-store') }}" method="POST" id="addComment">
                                    <textarea name="comment_body" id="comment_body" class="border-none w-full rounded-xl" rows="8"></textarea>
                                    <div class="flex justify-end mt-2">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="submit" value="Коментирај"
                                            class="focus:outline-none text-white bg-orange-500 hover:bg-yellow-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900 w-1/4 ">
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="comments my-5">
                            <h2 class="font-bold text-4xl ">Коментари</h2>
                            <div class="all-comments">
                                @if ($comments)
                                    @foreach ($comments as $comment)
                                        <div class="comment">
                                            <div class="comment-head">
                                                <div class="flex justify-start mt-2">
                                                    <img src="https://media.istockphoto.com/id/1388253782/photo/positive-successful-millennial-business-professional-man-head-shot-portrait.jpg?s=1024x1024&w=is&k=20&c=v0FzN5RD19wlMvrkpUE6QKHaFTt5rlDSqoUV1vrFbN4="
                                                        alt="" class="rounded-full  mr-5" width="100px"
                                                        height="100px">
                                                    <div>
                                                        <h4 class="text-xl font-bold">{{ $comment->user->name }}</h4>
                                                        <p class="text-gray-400">{{ $comment->created_at }}</p>
                                                    </div>
                                                </div>
                                                <div class="comment-body my-5">
                                                    <p class="text-lg">
                                                        {{ $comment->comment_body }}
                                                    </p>
                                                </div>
                                                <div class="comment-footer">
                                                    <div class="flex items-center justify-between my-6 w-1/4">
                                                        <a href="#"
                                                            class="flex items-center text-gray-600 hover:text-blue-500"
                                                            id="like-btn">
                                                            <i class="fa-regular fa-thumbs-up text-2xl"></i>
                                                            <span class="text-2xl mx-2">335</span>
                                                        </a>
                                                        <a href="#"
                                                            class="flex items-center text-gray-600 hover:text-blue-500"
                                                            id="comment-btn">
                                                            <i class="fa-regular fa-comment text-2xl"></i>
                                                            <span class="text-2xl mx-2">552</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>
    </main>

    <script>
        $(document).ready(function() {

            $('#addComment').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('user.comment-store') }}",
                    type: "POST",
                    data: $('#addComment').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $('.all-comments').append(`
                        <div class="comment">
                            <div class="comment-head">
                                <div class="flex justify-start mt-2">
                                    <img src="${res.user_avatar}" alt="" class="rounded-full mr-5" width="100px" height="100px">
                                    <div>
                                        <h4 class="text-xl font-bold">${res.user_name}</h4>
                                        <p class="text-gray-400">${res.created_at}</p>
                                    </div>
                                </div>
                                <div class="comment-body my-5">
                                    <p class="text-lg">${res.comment_body}</p>
                                </div>
                            </div>
                        </div>
                    `);
                    }
                });
            })

        });
    </script>


</x-app-layout>
