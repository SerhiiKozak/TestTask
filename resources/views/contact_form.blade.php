@extends ('layouts.app')

@section ('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <h3>Contact info</h3>
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($contact['id'] != 0)
                    <form class="form-horizontal" role="form" action="{{action('ContactsController@edit', $contact['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH"/>
                @else
                    <form class="form-horizontal" role="form" action="{{url('/contact/add')}}">
                @endif
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="first_name" type="text" value="{{$contact['first_name']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="last_name" type="text" value="{{$contact['last_name']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Cell:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="cell" type="text" value="{{$contact['cell']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Comment:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="comment" type="text" value="{{$contact['comment']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Leads</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            @if ($contact['id'] != 0)
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            @else
                                <input type="submit" class="btn btn-primary" value="Add Contact">
                            @endif
                            <span></span>
                            <a class="btn btn-primary" href="/contacts/{{$contact['id']}}" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
             </form>>
            </div>
        </div>
    </div>
    <hr>
@endsection