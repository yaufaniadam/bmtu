<x-layout>
    <x-slot:title>
        Gaji
    </x-slot:title>

    <div class="col-12 mx-auto mb-5">
        <div class="d-flex justify-content-end mb-3">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    {{ $selected_date }}
                </button>
                <div class="dropdown-menu">
                    @foreach($available_date as $date)
                        <a class="dropdown-item"
                            href="{{ $date['url'] }}">{{ $date['placeholder'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if(count($salary_detail)>0)
                    @foreach($salary_detail as $item)
                        <div class="col-12 d-flex border-bottom my-3 justify-content-between">
                            <span class="font-weight-{{ $item->style }}">{{ $item->judul }}</span>
                            <span>{{ $item->value != null ? number_format($item->value, 0, ",", ".") : '' }}</span>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 d-flex my-3">
                        <span class="font-weight-bold">Data gaji bulan ini masih kosong.</span>
                    </div>
                @endif


            </div>
        </div>
    </div>
</x-layout>
