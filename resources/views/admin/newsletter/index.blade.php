@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">NewsFeeds</h5>
        </div>
        <hr>
        <div class="col-md-12">
            {{-- <div class="card-box mb-30 card-border" style="margin-right: 64px;"> --}}
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Email</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($newsletters as $key => $newsletter)
                                                            <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $newsletter->email }}</td>

                                    <td class="d-flex">
                                        <form method="post" id="news-letter-form" action="{{ route('newsletter.destroy', $newsletter->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill" form="news-letter-form" onclick="deleteItem(event)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
                      function deleteItem(event){
            event.preventDefault();
            if(confirm('Are you sure you want to delete this Newsletter.??')){
                $('#news-letter-form').submit();
            }

        }
    </script>
@endsection
