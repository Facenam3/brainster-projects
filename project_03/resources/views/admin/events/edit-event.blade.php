<x-app-layout>

    <main>
        <div class="py-12 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Edit Blog</h1>
                <form action="{{ route('admin.event-update', $event->id) }}" method="POST" class=" mx-auto" id="addEvent">
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
                                    placeholder="Title" required value="{{ old('title', $event->title) }}">
                            </div>

                            <div class="mb-4">
                                <label for="objective" class="block text-gray-700 text-sm font-bold mb-2">
                                    Objective:
                                </label>
                                <input type="text" id="objective" name="objective"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Objective" required value="{{ old('objective', $event->objective) }}">
                            </div>

                            <div class="mb-4">
                                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">
                                    Location:
                                </label>
                                <input type="text" id="location" name="location"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Location" required value="{{ old('location', $event->location) }}">
                            </div>

                            <div class="mb-4">
                                <label for="ticket_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Ticket:
                                </label>
                                <select name="ticket_id" id="ticket_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled {{ old('ticket_id', $event->ticket_id) ? '' : 'selected' }}>Choose
                                        a
                                        ticket</option>
                                    @if ($tickets)
                                        @foreach ($tickets as $ticket)
                                            <option value="{{ $ticket->id }}">{{ $ticket->price }} </option>
                                        @endforeach

                                    @endif

                                </select>
                            </div>

                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="theme" class="block text-gray-700 text-sm font-bold mb-2">
                                    Theme:
                                </label>
                                <input type="text" id="theme" name="theme"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Theme" required value="{{ old('theme', $event->theme) }}">
                            </div>
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">
                                    Date:
                                </label>
                                <input type="datetime-local" id="date" name="date"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Date" required value="{{ old('date', $event->date) }}">
                            </div>
                            <div class="mb-3">
                                <label for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                <textarea id="description" rows="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Describe your event here..." name="description" required>{{ old('description', $event->description) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="speakers_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Speaker:
                                </label>
                                <select name="speaker_id" id="speaker_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option disabled {{ old('speaker_id', $event->speaker_id) ? '' : 'selected' }}>
                                        Choose
                                        a
                                        speaker</option>

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
