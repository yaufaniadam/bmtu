<x-layout>
    <x-slot:title>
        Laporan Kajian
    </x-slot:title>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('kajian.create') }}"
            class="btn btn-secondary btn-sm mr-3 d-flex align-items-center">
            <span class="mr-2">Tambah kajian</span>
            <i class="fas fa-fw fa-plus-circle"></i>
        </a>
    </div>

    <div style="min-height: 76vh" class="d-flex flex-column justify-content-between">
        <div>
            @foreach($sermons as $sermon)
                <div class="accordion mx-3 my-1" id="accordionKajian-{{ $sermon->id }}">
                    <div class="card border-bottom">
                        <div class="card-header bg-light" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left p-0" type="button" data-toggle="collapse"
                                    data-target="#collapseSermon-{{ $sermon->id }}" aria-expanded="true"
                                    aria-controls="collapseSermon-{{ $sermon->id }}">
                                    <b
                                        class="text-dark">{{ $sermon->tanggal->isoFormat("D MMMM Y") }}</b>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSermon-{{ $sermon->id }}" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionKajian-{{ $sermon->id }}">
                            <div class="card-body">
                                <p>{{ $sermon->faidah }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3 mx-3">
            {{ $sermons->links() }}
        </div>
    </div>



</x-layout>
