<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        Info
    </x-slot:title>

    <div class="col-12">
        @foreach($informations as $info)
            @php
                $date = \Carbon\Carbon::parse( $info['date']);
            @endphp
            <div class="mb-3">
                <a href="{{ route('information.detail',$info['id']) }}"
                    class="text-secondary">
                    <h5 class="m-0 text-dark">
                        {{ $info['title']['rendered'] }}
                    </h5>
                    <div class="d-flex">
                        <span>
                            <i class="fa-solid fa-calendar mr-2"></i>
                            {{ $date->isoFormat('D MMMM Y') }}
                        </span>
                    </div>
                </a>
            </div>
        @endforeach
        {{ $informations->links() }}
    </div>

</x-layout>
