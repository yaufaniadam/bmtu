<x-mail::message>
# Reset Password

Gunakan link dibawah untuk mereset password anda.
<x-mail::button :url="$url">
    Reset Password
</x-mail::button>

<x-mail::subcopy>
    Jika anda merasa tidak pernah mengajukkan permintaan peresetan password, anda dapat mengabaikan pesan ini.
</x-mail::subcopy>

Terimakasih,<br>
{{ config('app.name') }}
</x-mail::message>
