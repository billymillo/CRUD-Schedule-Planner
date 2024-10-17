<!doctype html>
<html lang="en">
<head>
    <title>Schedule Planner</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-3 bg-success-subtle p-3">
        @csrf
        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        <div class="d-flex flex-row justify-content-between">
            <h2 class='pt-2 text-success'>Money Daily Spend</h2>
            <button class="btn btn-warning text-white mt-2 mb-4 p-2">
                <a href="{{route('spend.add.form')}}" class="text-white link-underline-warning">Add Spend</a>
            </button>
        </div>
        <hr>
        @if (count($money) < 1)
            <h5 class='text-black'>Data kosong</h5>
        @else
            <div class="row">
                @foreach ($money as $index => $data)
                    <div class="col-md-3">
                        <div class="card w-100 p-3 mb-4">
                            <h5>{{ $index + 1 }} ) {{ $data['from'] }}</h5>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h6>{{ $data['date'] }}</h6>
                                <div>
                                    <a class="link-underline-light" href="{{ route('spend.edit.form', $data['id']) }}">
                                        <i class="fa-solid text-primary fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="link-underline-light" onclick="showModal('{{ $data->id }}', '{{ $data->from }}')" class="btn btn-danger">
                                        <i class="fa-solid fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
                            <h7 class='pb-2'> Rp. {{ number_format($data['total'], 0, ',', '.') }}</h7>
                            <p>{{ $data['to'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-hapus-akun" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete spend</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want To Delete This spend? <span id="title-spend"></span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" id="confirm-delete">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous">
    </script>
<script>

function showModal(id, name) {
        // Prepare the delete URL
        let urlDelete = "{{ route('spend.delete', ':id') }}";
        urlDelete = urlDelete.replace(':id', id);
        // Set the action attribute of the form
        $("#form-hapus-akun").attr('action', urlDelete);
        // Show the modal
        $('#exampleModal').modal('show');
        // Update the modal body with the spend title
        $('#from-spend').text(name);
    }
</script>
</html>
