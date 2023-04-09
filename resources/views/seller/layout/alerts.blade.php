@if (session()->has('info') || session()->has('status'))
    <div class="alert alert-primary alert-dismissible d-flex align-items-baseline show fade" role="alert">
        <span class="alert-icon alert-icon-lg text-info me-2">
            <i class="material-icons md-48 md-info"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <h5 class="alert-heading mb-2">Information!</h5>
            <p class="mb-0">{{ session()->get('info') ?? session()->has('status') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
@elseif (session()->has('success'))
    <div class="alert alert-success alert-dismissible d-flex align-items-baseline show fade" role="alert">
        <span class="alert-icon alert-icon-lg text-success me-2">
            <i class="material-icons md-48 md-check"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <h5 class="alert-heading mb-2">Success!</h5>
            <p class="mb-0">{{ session()->get('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
@elseif (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible d-flex align-items-baseline show fade" role="alert">
        <span class="alert-icon alert-icon-lg text-warning me-2">
            <i class="material-icons md-48 md-warning"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <h5 class="alert-heading mb-2">Warning!</h5>
            <p class="mb-0">{{ session()->get('warning') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
@elseif (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible d-flex align-items-baseline show fade" role="alert">
        <span class="alert-icon alert-icon-lg text-error_outline me-2">
            <i class="material-icons md-48 md-error_outline"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <h5 class="alert-heading mb-2">Danger!</h5>
            <p class="mb-0">{{ session()->get('danger') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
@elseif ($errors->any())
    <div class="alert alert-danger alert-dismissible d-flex align-items-baseline show fade" role="alert">
        <span class="alert-icon alert-icon-lg text-error_outline me-2">
            <i class="material-icons md-48 md-error_outline"></i>
        </span>
        <div class="d-flex flex-column ps-1">
            <h5 class="alert-heading mb-2">Danger!</h5>
            <ul class="pt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
@endif
