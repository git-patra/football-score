@section('score')

<section class="text-center score-match">
    <h2 class="mt-3">Score Match</h2>
    <br>
    <form action="{{ url('/api/match/ui') }}" method="POST" class="justify-content-center text-center">
        <div class="row justify-content-center mb-3">
            <div class="col-md-3">
                <select id="league-score" class="custom-select" name="league">
                    <option selected disabled>Select League</option>
                    @foreach ($leagues as $league)
                    <option value="{{ $league->id }}">{{ $league->league_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-3 col-sm-12 col-12">
                <select name="clubHome" id="selectClubHome" class="custom-select">
                </select>
            </div>
            <div class="col-md-1 col-sm-12 col-12">
                <input type="number" class="form-control" name="scoreHome" id="scoreHome" placeholder="0">
            </div>
            <div class="col-md-1 col-sm-12 col-12">
                <input type="number" class="form-control" name="scoreAway" id="scoreAway" placeholder="0">
            </div>
            <div class="col-md-3 col-sm-12 col-12">
                <select name="clubAway" id="selectClubAway" class="custom-select">
                </select>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-outline-success">submit</button>
        </div>
    </form>

    <div class="accordion mt-3" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-xl-10 col-md-10 col-sm-10 col-10">
                                <h4>
                                    Matches
                                </h4>
                            </div>
                            <div class="col-xl-2 col-md-2 col-sm-2 col-2 text-right">
                                <h4>
                                    <i class="arrow up"></i>
                                </h4>
                            </div>
                        </div>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body text-left">
                    <div id="table-score" class="table-responsive-xl">
                        <table class="table table-striped">
                            <thead>
                                <tr class=" text-center">
                                    <th scope="col">Home</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Away</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody class=" text-center">
                                <tr>
                                    <td colspan="4">
                                        <h6 class="text-danger">Select league for see the matches and input a score.
                                        </h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection