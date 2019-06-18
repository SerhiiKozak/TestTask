@extends ('layouts.app')

@section('content')

    <div class="col-md-8">
        <a class="btn btn-primary" href="/contacts/0/form" role="button">Add</a>
        <a class="btn btn-primary" href="/contacts/migrate" role="button">Migrate</a>
    </div>
    <br>
    @if(!empty(session()->get('message')))
    <div class='alert alert-danger'>
        <p>{{session()->get('message')}}</p>
    </div>
    @endif
    <br>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Cell</th>
                <th scope="col">Comment</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr >
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->cell}}</td>
                    <td>{{$contact->comment}}</td>
                    <td>
                        <a class="btn btn-primary" href="/contacts/{{$contact->id}}" role="button">Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
