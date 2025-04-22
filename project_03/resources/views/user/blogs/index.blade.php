<x-app-layout>

    <main class="flex p-5 ">
        <div class="p-10">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">

                <div class="flex align-center">
                    <p class="font-small text-gray-800">Почетна</h1>
                        <span><i class="fa-solid fa-chevron-right mx-2"></i></span>
                    <p class="font-small text-orange-400">Блогови</p>
                </div>
                <div class="blogs mt-6">
                    <div class="blog-head">
                        <h1 class="font-3xl text-6xl">Најнови блогови</h1>
                    </div>
                    <div class="blog-body w-full mt-8">
                        <div class="grid grid-cols-2 gap-6">

                            @if ($blogs)
                                @foreach ($blogs as $blog)
                                    <div
                                        class="flex bg-white border border-gray-200 rounded-tl-none rounded-bl-full rounded-tr-none rounded-br-full ">
                                        <img class="w-1/2 object-cover rounded-tl-none rounded-bl-full rounded-t-none rounded-b-none"
                                            src="https://plus.unsplash.com/premium_photo-1714051661316-4432704b02f8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="">

                                        <div
                                            class="flex flex-col justify-between p-4 leading-normal  rounded-br-full w-1/2">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                                {{ $blog->blog_title }}
                                            </h5>
                                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                                <a href="{{ route('user.single-blog', $blog->id) }}"
                                                    class="text-orange-500 border-b-2 border-b-orange-500">Прочитај
                                                    повеќе</a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>

            </div>
    </main>

</x-app-layout>
