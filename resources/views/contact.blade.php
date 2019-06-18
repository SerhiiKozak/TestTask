@extends ('layouts.app')

@section ('content')
@if (!empty($contact))

@endif

@if(!empty(session()->get('message')))
<div class='alert alert-danger'>
<p>{{session()->get('message')}}</p>
</div>
@endif

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$contact->first_name}} {{$contact->last_name}}
                    </h5>
                </div>
            </div>
            <div>
                <a class="btn btn-primary" href="/contacts/{{$contact->id}}/form" role="button">Edit Contact</a>
                <form method="post" class="delete_form" action="{{action('ContactsController@destroy', $contact->id)}}">
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger" value="Delete Contact"/>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$contact->first_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$contact->last_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Cell</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$contact->cell}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Comment</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$contact->comment}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Leads</label>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    @foreach($leads as $lead)
                                        <li>{{$lead->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('.delete_form').on('submit', function () {
            if(confirm('Are you sure you want to delete it?'))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
</script>

@endsection