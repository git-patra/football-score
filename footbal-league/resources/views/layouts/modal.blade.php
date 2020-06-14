@section('modal-league')

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#inputLeague">
    Input League
</button>

<!-- Modal -->
<div class="modal fade" id="inputLeague" tabindex="-1" role="dialog" aria-labelledby="inputLeagueLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputLeagueLabel">Input League</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action='{{ url('/api/league') }}' method='POST' class="justify-content-center">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <input type="text" class="form-control" id="inputLeague" name="leagueName"
                                placeholder="League Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('modal-club')

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#inpuClub">
    Input Club
</button>

<!-- Modal -->
<div class="modal fade" id="inpuClub" tabindex="-1" role="dialog" aria-labelledby="inputClubLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputClubLabel">Input Club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/api/club') }}" method="POST" class="justify-content-center">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <input type="text" class="form-control" id="inputClub" name="clubName"
                                placeholder="Club Name">
                        </div>
                        <div class="col-md-12 mt-3">
                            <select class="custom-select" name="league">
                                @foreach ($leagues as $league)
                                <option value="{{ $league->id }}">{{ $league->league_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection