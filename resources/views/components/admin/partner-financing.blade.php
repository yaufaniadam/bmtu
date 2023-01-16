<div class="card mb-3">
    <div class="card-header">
        Pembiayaan
    </div>
    <div class="card-body">
        <table class="table border-bottom border-left border-right">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($financing_histories as $history)
                    <tr class="text-dark">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $financing_histories->links() }}
        </div>
    </div>
</div>
