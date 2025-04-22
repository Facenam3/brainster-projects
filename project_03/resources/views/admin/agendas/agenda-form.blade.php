<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Agenda</h1>
                <form action="{{ route('admin.agenda-store') }}" method="POST" class=" mx-auto" id="addAgenda">
                    @csrf
                    <div class="flex">
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
                                <label for="event_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Events:
                                </label>
                                <select name="event_id" id="event_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select event</option>

                                    @if ($events)
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}"> {{ $event->title }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">
                                    Start Time:
                                </label>
                                <input type="time" id="start_time" name="start_time"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Start time" required>
                            </div>

                            <div class="mb-4">
                                <label for="conference_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Conferences:
                                </label>
                                <select name="conference_id" id="conference_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select conference</option>

                                    @if ($conferences)
                                        @foreach ($conferences as $conference)
                                            <option value="{{ $conference->id }}"> {{ $conference->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-3">
                                <label for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                <textarea id="description" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Describe your agenda here..." name="description" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">
                                    End Time:
                                </label>
                                <input type="time" id="end_time" name="end_time"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Start time" required>
                            </div>

                            <div class="mb-4">
                                <label for="speaker_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Special Guest:
                                </label>
                                <select name="speaker_id" id="speaker_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select guest</option>

                                    @if ($speakers)
                                        @foreach ($speakers as $speaker)
                                            <option value="{{ $speaker->id }}"> {{ $speaker->name }} </option>
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

            $('#addAgenda').on('submit', function(e) {
                e.preventDefault();


                $.ajax({
                    url: "{{ route('admin.agenda-store') }}",
                    type: "POST",
                    data: $('#addAgenda').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);
                        window.location.href = "{{ route('admin.agendas') }}";
                    },


                });
            });
        });
    </script>
</x-app-layout>
