<x-layout.default>

    <link rel="stylesheet"
        href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.css" />
    <link rel="stylesheet" href="Editor-2.2.2/css/editor.dataTables.css">

    <script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.js"></script>
    <script src="Editor-2.2.2/js/dataTables.editor.js"></script>

    <script>
        $(document).ready(function() {
            $('#company-table').DataTable();
        });
    </script>
    <!-- forms grid -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        .container_table {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
        }

        .alert-danger {
            color: red;
        }

        .alert-success {
            color: #5CB85C;
        }
    </style>



    <div class="container mt-5">
        <!-- DataTables Container -->
        <!-- Modal -->
        <div x-data="modal">
            <button type="button" class="btn btn-primary" @click="toggle"
                style="width: 100px; float:right; margin-bottom: 8px;">Add</button>
            <div class="fixed inset-0 bg-[black]/60 z-[999]  hidden" :class="open && '!block'">
                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300
                        class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                            <h5 class="font-bold text-lg">Add Country</h5>
                            <button type="button" class="text-white-dark hover:text-dark" @click="toggle"><svg
                                    style="max-height: 40px;"> ... </svg></button>
                        </div>
                        <div class="p-5">
                            @include('countries.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container_table">
        <table id="company-table" class="table">
            <thead>
                <tr>
                    <th> Sid</th>
                    <th> Brand Name </th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $index => $category)
                    <tr class="border-b">
                        <td class="p-2">{{ $index + 1 }}</td>
                        <td class="p-2">{{ $category->country }}</td>
                        <td>
                            <a href="{{ route('countries.edit', $category->id) }}" style="width: 50px; "
                                class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!-- Include DataTables JS and custom script -->
    <script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.js"></script>
    <script src="Editor-2.2.2/js/dataTables.editor.js"></script>
    <script>
        $(document).ready(function() {
            $('#company-table').DataTable();
        });
    </script>

</x-layout.default>
