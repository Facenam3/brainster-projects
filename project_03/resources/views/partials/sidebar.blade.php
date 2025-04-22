<aside class="bg-white w-64 min-h-screen p-4">
    <a href="{{ route('admin.dashboard') }}" class="text-orange-500 text-lg mx-3">Admin Dashboard</a>
    <ul class="mt-6">
        <li>
            <a href="{{ route('admin.users') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-users mx-2"></i>
                Users
            </a>
        </li>
        <li>
            <a href="{{ route('admin.blogs') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-regular fa-folder-open mx-2"></i>
                Blogs
            </a>
        </li>
        <li>
            <a href="{{ route('admin.events') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-calendar-check mx-2"></i>
                Events
            </a>
        </li>
        <li>
            <a href="{{ route('admin.conferences') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-calendar-check mx-2"></i>
                Conferences
            </a>
        </li>
        <li>
            <a href="{{ route('admin.agendas') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-calendar-check mx-2"></i>
                Agendas
            </a>
        </li>
        <li>
            <a href="{{ route('admin.speakers') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-users mx-2"></i>
                Speakers
            </a>
        </li>
        <li>
            <a href="{{ route('admin.tickets') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-ticket-simple mx-2"></i>
                Tickets
            </a>
        </li>
        <li>
            <a href="{{ route('admin.company') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-house mx-2"></i>
                Company
            </a>
        </li>
        <li>
            <a href="{{ route('admin.employees') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-users mx-2"></i>
                Employees
            </a>
        </li>
        <li>
            <a href="{{ route('admin.comments') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-comment mx-2"></i>
                Comments
            </a>
        </li>
        <li>
            <a href="{{ route('admin.badges') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-certificate mx-2"></i>
                Badges
            </a>
        </li>
        <li>
            <a href="{{ route('admin.topics') }}" id="btn"
                class="block text-gray-600 hover:bg-orange-500 hover:text-white px-4 py-2">
                <i class="fa-solid fa-comment mx-2"></i>
                Topics
            </a>
        </li>
    </ul>
</aside>


<script>
    // $(document).on('click', '#btn', function(e) {
    //     $('aside a').forEach(element => {
    //         element.addClass('bg-orange-500', 'text-white');
    //     });
    // });
</script>
