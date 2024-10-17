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
    <div class="container d-flex justify-content-center flex-column align-items-center mt-3 bg-primary-subtle p-3">
        <div class="row g-3">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-between">
                    <h2 class='pt-2 text-primary'>Daily Schedule Planner</h2>
                <div class="d-flex gap-3">
                    <button class="btn btn-info text-white mt-2 mb-4 p-2">
                        <a href="{{ route('planner.add.form') }}" class="text-white link-underline-info">Tambah</a>
                    </button>
                    <button class="btn btn-success text-white mt-2 mb-4 p-2">
                        <a href="{{ route('spend.money') }}" class="text-white link-underline-success">My Daily Spend</a>
                    </button>
                </div>
                </div>
                <hr>
            </div>
            @if (count($plan) < 1)
                <h5 class='text-black'>Data kosong</h5>
            @else
                @foreach ($plan as $index => $data)
                    <div class="col-md-3"> <!-- Each card takes up 3 columns (1/4 of the row) -->
                        <div class="card w-100 p-3 mb-4">
                            <h5>{{ $data['days'] }}</h5>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h6>{{ $index + 1}} ) {{ $data['title'] }}</h6>
                                <div>
                                    <a class="link-underline-light" href="{{ route('planner.edit.schedule', $data['id']) }}">
                                        <i class="fa-solid text-primary fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="link-underline-light" onclick="showModal('{{ $data->id }}', '{{ $data->title }}')" class="btn btn-danger">
                                        <i class="fa-solid fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
                            <h7 class='pb-2'> Time : {{ $data['time']}}</h7>
                            <p>{{ $data['description']}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @csrf
        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif

<!-- Modal Structure -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-hapus-akun" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do You Really Want To Delete This Schedule? <span id="title-schedule"></span>?
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
        let urlDelete = "{{ route('planner.hapus', ':id') }}";
        urlDelete = urlDelete.replace(':id', id);
        // Set the action attribute of the form
        $("#form-hapus-akun").attr('action', urlDelete);
        // Show the modal
        $('#exampleModal').modal('show');
        // Update the modal body with the schedule title
        $('#title-schedule').text(name); // Use 'name' instead of 'title'
    }
</script>
</html>
