<x-layout>
    @push('css')
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <x-slot:title>
        Download Dokumen
    </x-slot:title>

    @foreach($sop as $sop)
        <div class="col-12 my-3">
            @php
                $exploded_url = explode('/',$sop['_links']['wp:attachment'][0]['href']);
                $query = $exploded_url[6];
                // dump($exploded_url);
            @endphp
            <a href="{{ route('document.download',$query) }}" target="_blank"
                class="text-secondary">
                <h5 class="text-dark">
                    {{ $sop['title']['rendered'] }}
                </h5>
            </a>
        </div>
    @endforeach

</x-layout>
