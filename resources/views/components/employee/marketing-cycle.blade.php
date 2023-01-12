<div class="card pb-4">
    <div class="card-header">
        Marketing Cycle
    </div>
    @if($financing_cycles != null)
        @foreach($financing_cycles as $financing_cycles)
            <div class="card-body pb-0" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-block btn-light text-left" type="button" data-toggle="collapse"
                        data-target="#collapse-{{ $financing_cycles->cycle->id }}" aria-expanded="true"
                        aria-controls="collapse-{{ $financing_cycles->cycle->id }}">
                        {{ $financing_cycles->cycle->cycle }}
                        @if(in_array($financing_cycles->cycle->id,$finished_cycles))
                            <i class="fas fa-fw fa-check text-success"></i>
                        @else
                            <i class="fas fa-fw fa-spinner text-secondary"></i>
                        @endif
                    </button>
                </h2>
                <div id="collapse-{{ $financing_cycles->cycle->id }}" class="collapse
                    {{ $current_cycle->id_cycle == $financing_cycles->cycle->id ? 'show' : '' }}
                    col-12 mt-2" aria-labelledby="headingOne" data-parent="#headingOne">
                    @if($financing_cycles->tanggal != null)
                        <div class="d-flex flex-row align-items-center mb-1">
                            <small class="mr-1"><i class="fas fa-fw fa-calendar"></i></small>
                            <span>{{ $financing_cycles->tanggal->isoFormat('D MMMM Y') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('financing-cycle.update',$financing_cycles->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-row align-items-center text-dark mb-1">
                            <small class="mr-1"><i class="fas fa-fw fa-image"></i></small>
                            <span class="mr-1"><b>Foto</b></span>
                            @if($financing_cycles->foto != null)
                                <a href="{{ asset($financing_cycles->foto) }}" class="badge badge-success">
                                    Lihat Foto
                                </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="file"
                                class="form-control-file {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                                id="exampleFormControlFile1" name="foto">
                            <div class="invalid-feedback">
                                {{ $errors->first('foto') }}
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center text-dark mb-1">
                            <small class="mr-1"><i class="fas fa-fw fa-edit"></i></small>
                            <span><b>Catatan</b></span>
                        </div>
                        <div class="form-group">
                            <textarea
                                class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}"
                                name="keterangan" id="keterangan"
                                rows="5">{{ $financing_cycles->keterangan }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('keterangan') }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-warning float-right">Submit</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif


</div>
