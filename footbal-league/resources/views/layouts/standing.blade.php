@section('standing')

<section id="standings" class="standings text-center pb-5">
    <h2 class="mt-3">League Standings</h2>

    <form class="mt-4">
        <div class="form-group row">
            <div class="col-xl-3 col-sm-12 col-12">
                <select id="league-standing" class="custom-select" name="league">
                    <option selected disabled>Filter League</option>
                    @foreach ($leagues as $league)
                    <option value="{{ $league->id }}">{{ $league->league_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-3 col-sm-12 col-12">
                <input type="text" class="form-control" id="searchClub" placeholder="Search Club">
            </div>
        </div>
    </form>

    <div id="table-standing" class="table-responsive-xl mt-4">
        <table class="table table-striped">
            <thead>
                <tr class=" text-center">
                    <th scope="col">No</th>
                    <th scope="col">Club</th>
                    <th scope="col">MP</th>
                    <th scope="col">W</th>
                    <th scope="col">D</th>
                    <th scope="col">L</th>
                    <th scope="col">Pts</th>
                </tr>
            </thead>
            <tbody class=" text-center">
                <tr>
                    <td colspan='7'>
                        <h6 class="text-danger">Select league.
                        </h6>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection