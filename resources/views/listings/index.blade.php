<x-layout>
  @include('partials._hero')
  @include('partials._search')
{{--  @if(request('search'))--}}
{{--    <p style="text-align: center">Search Results for : <span style="color: #ef3b2d">{{request('search')}}</span></p>--}}
{{--  @endif--}}
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @if(count($listings) == 0)
      <p>No Listings Found</p>
    @else

      @foreach ($listings as $listing)
        <x-listing-card :listing="$listing"/>
      @endforeach
    @endif
  </div>
  <div class="mt-6 p-4">
    {{$listings->links()}}
  </div>
</x-layout>
