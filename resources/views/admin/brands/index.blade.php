<x-admin>
    @section('title', 'Brands')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Brands</h3>
            <div class="card-tools">
                <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="roleTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->created_at }}</td>
                            <td>{{ $brand->updated_at }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.brands.edit', $brand) }}"
                                        class="btn btn-sm btn-secondary mr-2">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" id="{{ $brand->id }}"
                                        class="btn btn-sm btn-danger delete-btn">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                No Brands created
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <form action="{{ route('admin.brands.destroy', 11111) }}" method="post" id="delete-form">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#roleTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });

            $('.delete-btn').click(function() {
                $('#delete-form').attr('action', $('#delete-form').attr('action').replace(11111, this.id))
                $('#delete-form').submit()
            })
        </script>
    @endsection
</x-admin>
