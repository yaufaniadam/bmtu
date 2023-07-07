<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        SOP BMT UMY
    </x-slot:title>

    <div class="col-12">
        @foreach($informations as $info)
            <div class="mb-3">
                <a href="{{ route('document.detail',$info['id']) }}"
                    class="text-light btn btn-block bg-dark">
                    <h5 class="m-0">
                        {{ strtoupper($info['name']) }}
                    </h5>
                </a>
            </div>
        @endforeach
        {{ $informations->links() }}
    </div>

</x-layout>
