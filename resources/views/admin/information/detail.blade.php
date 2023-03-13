<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        Info
    </x-slot:title>

    <div class="col-12 my-3">
        <span>{{ $postdetail['date'] }}</span>
        <h1 class="mb-3 text-dark">{{ $postdetail['title'] }}</h1>
        <img src="{{ $postdetail['featured_image'] }}" class="img-fluid mb-3" alt="thumbnail">
        <p>
            {!! $postdetail['content'] !!}
        </p>
    </div>

</x-layout>
