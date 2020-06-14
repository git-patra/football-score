//! Arrow Rotate */
$(".score-match .btn-link").click(function() {
    $(".score-match .btn-link i").toggleClass("arrow-rotate");
});

//! Fetch Ajax for table Matches */
const scoreMatch = () => {
    //* Fetch Json
    fetch("http://127.0.0.1:8000/api/match")
        .then(respone => {
            return respone.json();
        })
        .then(responeJson => {
            const data = responeJson;
            const matches = data["data"];

            //* Event Listener
            $("#league-score").change(function() {
                $("#table-score tbody").empty();

                let leagueSelect = $(this)
                    .children("option:selected")
                    .val();

                $.each(matches, function(i, match) {
                    if (match.league_id == leagueSelect) {
                        let content = `
                        <tr>
                            <td scope="row">${match.club_home}</td>
                            <td>${match.score}</td>
                            <td>${match.club_away}</td>
                            <td>${match.created_at}</td>
                        </tr>`;
                        $("#table-score tbody").append(content);
                    }
                });
            });
        });
};
scoreMatch();

//! Fetch Ajax for Select Club Home & Away on Matches */
const selectClub = () => {
    //* Fetch JSON
    fetch("http://127.0.0.1:8000/api/club")
        .then(respone => {
            return respone.json();
        })
        .then(responeJson => {
            const data = responeJson;
            const clubs = data["data"];

            //* Event Listener
            $("#league-score").change(function() {
                $("#selectClubHome").empty();
                $("#selectClubAway").empty();

                let leagueSelect = $(this)
                    .children("option:selected")
                    .val();

                $.each(clubs, function(i, club) {
                    if (club.league_id == leagueSelect) {
                        let content = `
                        <option value="${club.club}">${club.club}</option>`;
                        $("#selectClubHome").append(content);
                        $("#selectClubAway").append(content);
                    }
                });
            });
        });
};
selectClub();

//! Fetch Ajax for table Standings by League */
const standings = () => {
    fetch("http://127.0.0.1:8000/api/standing/all/all")
        .then(respone => {
            return respone.json();
        })
        .then(responeJson => {
            const data = responeJson;
            const standings = data["data"];

            //* Sort Data
            standings.sort(
                (a, b) => b.Pts - a.Pts || b.W - a.W || b.D - a.D || b.L - a.L
            );

            //* Event Listener
            $("#league-standing").change(function() {
                $("#table-standing tbody").empty();
                let leagueSelect = $(this)
                    .children("option:selected")
                    .val();

                let x = 1;
                $.each(standings, function(i, standing) {
                    if (standing.league_id == leagueSelect) {
                        let content = `
                        <tr>
                            <td>${x}</td>
                            <td scope="row">${standing.club}</td>
                            <td>${standing.MP ? standing.MP : 0}</td>
                            <td>${standing.W ? standing.W : 0}</td>
                            <td>${standing.D ? standing.D : 0}</td>
                            <td>${standing.L ? standing.L : 0}</td>
                            <td>${standing.Pts ? standing.Pts : 0}</td>
                        </tr>`;
                        $("#table-standing tbody").append(content);
                        x++;
                    }
                });
            });
        });
};
standings();

//! Filter Search by League */
const standingsSearch = () => {
    //* Event Listener
    $("#searchClub").on("keyup", function() {
        var keyword = $(this)
            .val()
            .toLowerCase();

        console.log(keyword);
        $("#table-standing tbody tr").filter(function() {
            $(this).toggle(
                $(this)
                    .text()
                    .toLowerCase()
                    .indexOf(keyword) > -1
            );
        });
    });
};
standingsSearch();
