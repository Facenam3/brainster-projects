<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Edite Agenda</h1>
                <form action="{{ route('admin.agenda-update', $agenda->id) }}" method="POST" class=" mx-auto"
                    id="addAgenda">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Title:
                                </label>
                                <input type="text" id="title" name="title"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Title" required value="{{ old('title', $agenda->title) }}">
                            </div>



                            <div class="mb-4">
                                <label for="event_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Events:
                                </label>
                                <select name="event_id" id="event_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{ old('event_id', $agenda->event_id) }}" disabled selected>
                                        @if (!empty($agenda->event->title))
                                            {{ $agenda->event->title }}
                                        @else
                                            Select event
                                        @endif
                                    </option>
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
                                    placeholder="Start time" required
                                    value="{{ old('start_time', \Carbon\Carbon::parse($agenda->start_time)->format('H:i')) }}">
                            </div>

                            <div class="mb-4">
                                <label for="conference_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Conferences:
                                </label>
                                <select name="conference_id" id="conference_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled
                                        {{ old('conference_id', $agenda->conference_id) ? '' : 'selected' }}>
                                        Choose
                                        an
                                        agenda</option>
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
                                    placeholder="Describe your conference here..." name="description" required>{{ old('description', $agenda->description) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">
                                    End Time:
                                </label>
                                <input type="time" id="end_time" name="end_time"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Start time" required
                                    value="{{ old('end_time', \Carbon\Carbon::parse($agenda->end_time)->format('H:i')) }}">
                            </div>

                            <div class="mb-4">
                                <label for="speakers_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Speakers:
                                </label>
                                <select name="speakers_id" id="speakers_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled {{ old('speakers_id', $agenda->speakers_id) ? '' : 'selected' }}>
                                        {{ $agenda->speaker->name }} </option>

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

</x-app-layout>
