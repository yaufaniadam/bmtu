<small class="text-center">
    <form onsubmit="return confirm('Data yang sudah dihapus tidak dapat dikembalikan. Lanjutkan?');"
        action="{{ route('user.destroy',$user_id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="text-danger btn btn-sm">
            <i class="fas fa-fw fa-trash"></i>
        </button>
    </form>
</small>
