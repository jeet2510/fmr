<x-layout.default>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>City</title>
      <!-- Include Tailwind CSS stylesheet -->
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
          {{-- <a class="navbar-brand h1" href="{{ route('countries.index') }}">CRUDPosts</a> --}}
          <div class="justify-end ">
              <a class="btn btn-sm btn-success" href="{{ route('cities.create') }}">Add City</a>
          </div>
        </div>
      </nav>
      <div class="container mt-5">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($cities as $post)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $post->country }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $post->city_name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('cities.edit', $post->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</a>
                <form action="{{ route('cities.destroy', $post->id) }}" method="post" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </body>
    </html>

</x-layout.default>
