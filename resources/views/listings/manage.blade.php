<x-layout>
    <x-card class="p-10">
      <header>
        <h1
          class="text-3xl text-center font-bold my-6 uppercase"
        >
          Manage Gigs
        </h1>
      </header>
      @if($listings->isEmpty())
        <p style="text-align: center; margin-top: 1rem">You have no listings</p>
      @else
        <table class="w-full table-auto rounded-sm">
        <tbody>
        @foreach($listings as $listing)
        <tr class="border-gray-300">
          <td
            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
          >
            <a href="/listings/{{$listing->id}}">
              {{$listing->title}}
            </a>
          </td>
          <td
            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
          >
            <a
              href="/listings/{{$listing->id}}/edit"
              class="text-blue-400 px-6 py-2 rounded-xl"
            ><i
                class="fa-solid fa-pen-to-square"
              ></i>
              Edit</a
            >
          </td>
          <td
            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
          >
            <form action="/listings/{{$listing->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="text-red-600" type="submit">
                <i
                  class="fa-solid fa-trash-can"
                ></i>
                Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      @endif
    </x-card>
</x-layout>
