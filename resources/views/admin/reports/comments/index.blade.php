@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <div class="center">
            <div class="box-content">
                <h4 class="box-title">Comment Reports</h4>

                <!-- /.box-title -->
                <!-- /.dropdown js__dropdown -->
                <div class="table-responsive table-purchases">
                    <table class="table table-bordered border-1 m-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Comment</th>
                                <th>Posted By</th>
                                <th>Reported By</th>
                                <th>Reason</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportedComments as $reportedComment)
                            <tr>
                                <td>{{ ($reportedComments->currentPage()-1) * $reportedComments->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $reportedComment->comment->comment }}</td>
                                <td>{{ $reportedComment->comment->user->full_name }}</td>
                                <td>{{ $reportedComment->reporter->full_name }}</td>
                                <td>{{ $reportedComment->description }}</td>
                                <td>{{ $reportedComment->created_at->format('d M Y'); }}</td>
                                <td class="flex-warp">
                                    <div class="mx-3 text-center">
                                        <form action="{{ route('admin.reports.comments.destroy', $reportedComment->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash-o text-dark"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $reportedComments->appends(request()->query())->links() }}
                <!-- /.table-responsive -->
            </div>
        </div>
    </div>
@endsection

