@extends('layout.genric')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                    class="text-decoration-none text-dark"><span>Home</span></a></li>

            <li class="breadcrumb-item active">
                <span> <b> Short Question </b></span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Short Questions Management</strong>
                            <div class="float-right ">
                                @can('short_question-create')
                                    <a class="btn btn-success btn-sm text-white" href="{{ route('shortQuestions.create') }}">
                                        Create</a>
                                @endcan

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">



                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                @php
                                    $i = 0;
                                @endphp
                                <table class="table table-bordered row-border" id="Short">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Question</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Chapter</th>

                                            <th>Term</th>
                                            <th width="30px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($model as $key => $data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $data->question }}</td>
                                                <td>{{ $data->class->name }}</td>
                                                <td>{{ $data->subject->name }}</td>
                                                <td>{{ $data->chapter->name }}</td>
                                                <td>{{ $data->term->name }}</td>


                                                <td>
                                                    <div class=" dropdown">
                                                        <a class="btn btn-sm btn-primary dropdown-toggle mr-1"
                                                            data-coreui-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cogs"></i>

                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end pt-0">
                                                            <div class="dropdown-header bg-light py-2">
                                                            </div>
                                                            <a class="dropdown-item "
                                                                href="{{ route('shortQuestions.show', $data->id) }}">Show
                                                            </a>

                                                            @can('mcq-edit')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('shortQuestions.edit', $data->id) }}"><i <i
                                                                        data-feather="edit-2"
                                                                        class="mr-50"></i><span>Edit</span></a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('shortQuestions.m.edit', $data->id) }}">Multi
                                                                    Edit</a>
                                                            @endcan

                                                            @can('mcq-delete')
                                                                <form method="POST"
                                                                    action="{{ route('shortQuestions.destroy', $data->id) }}"
                                                                    style="display:inline">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="submit" class="dropdown-item"><i
                                                                            data-feather="edit-2" class="font-medium-3"></i>
                                                                        <span>Delete</span></button>


                                                                    </button>

                                                                </form>
                                                            @endcan

                                                            <div class="dropdown-header bg-light py-2">


                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- edit --}}
@endsection
@section('script')
    <script>
        // function trash(s) {
        //     if (confirm("Are you sure")) {

        //         $.ajax({
        //             type: "GET",
        //             url: `{{ url('tremsdeleted') }}/${s}`,
        //             success: function(model) {
        //                 refreshTable();
        //                 Swal.fire(

        //                     'You delete the record!',

        //                 );

        //             }
        //         });
        //     }
        // }

        function foo(e) {

            let id = $(e).attr('data-id');
            let name = $(e).attr('data-name');
            // alert(id + '-' + name);
            $("#id").val(id);
            $('#name').val(name);

        }

        $(document).ready(function() {
            $('#Short').DataTable();
        });
    </script>
@endsection
