<div class="card pb-4">
    <div class="card-header">
        Marketing Cycle
    </div>
    @foreach($cycles as $cycle)
        <div class="card-body pb-0" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-block btn-light text-left" type="button" data-toggle="collapse"
                    data-target="#collapse-{{ $cycle->id }}" aria-expanded="true"
                    aria-controls="collapse-{{ $cycle->id }}">
                    {{ $cycle->cycle }}
                    <i class="fas fa-fw fa-check text-success"></i>
                </button>
            </h2>
            <div id="collapse-{{ $cycle->id }}" class="collapse col-12 mt-2" aria-labelledby="headingOne"
                data-parent="#headingOne">
                <div class="d-flex flex-row align-items-center mb-1">
                    <small class="mr-1"><i class="fas fa-fw fa-calendar"></i></small>
                    <span>10 Agustus 2022</span>
                </div>
                <div class="d-flex flex-row align-items-center text-dark mb-1">
                    <small class="mr-1"><i class="fas fa-fw fa-image"></i></small>
                    <span class="mr-1"><b>Foto</b></span>
                    <a href="" class="badge badge-success">Lihat Foto</a>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="d-flex flex-row align-items-center text-dark mb-1">
                    <small class="mr-1"><i class="fas fa-fw fa-edit"></i></small>
                    <span><b>Catatan</b></span>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="" id="" rows="5"></textarea>
                </div>
            </div>
        </div>
    @endforeach

</div>
