<!DOCTYPE html>
<html>
  <body>
    <div class="container">
      <h3>Score Apps</h3>
      <img class="materialboxed" src="homepage.png" width="400px" />
      <p>
        Simple Apps for recording score & see standings.
      </p>
      <p>
        This mini-project is build with laravel 7. For Launch this mini-project,
        please do this steps :
      </p>
      <ul>                        
        <li>composer Install</li>
        <li>npm Install</li>
        <li>
          Rename file ".env.example" to ".env" (You can edit a database name)
        </li>
        <li>Make a database, recommend database name : football_league</li>
        <li>php artisan key:generate</li>
        <li>php artisan migrate</li>
        <li>
          And last, <b>launch : </b>php artisan serve for see User Interface.
        </li>
      </ul>
      <p>
        <i
          ><b>Note : </b> 
          <ol>
          <li>Recommend to add league, club, match and see standing
          on User Interface.</i></li>
          <li>While add a match, dont input a same club on home & away select club.</li> 
          <li>If ajax select league doesnt work, try to refresh again</li>
        <li><b>Paste API documentation to file html, for better look.</b></li>
          </ol>
      </p>
      <br />

      <!-- API Documentation -->
      <h4>API Documentation</h4>
      <p>
        <h6><a href="#league">League</a> || 
        <a href="#club">Club</a> || 
        <a href="#match">Match</a> || 
        <a href="#standing">Standing</a></h6>
      </p>

      <!-- League -->
      <br />
      <div id="league" class="scrollspy">
        <h5><b>League</b></h5>
        <p>
          You have to input a league before input club name. You can input a
          league on User Interface or Postman with API link
        </p>
        <h6><b>GET</b></h6>
        <p>Access : https://localhost:8000/api/league</p>
        <h6><b>POST</b></h6>
        No header, just input body
        <p>Access : https://localhost:8000/api/league</p>
        <p>Body :</p>
        <ol>
          <li>leagueName : (League Name)</li>
        </ol>
      </div>

      <!-- Club -->
      <br />
      <div id="club" class="scrollspy">
      <h5><b>Club</b></h5>
      <p>
        If you add club, it will automatic add table standing with point is 0.
        Before input a club, be sure u have to input a league.
      </p>
      <h6><b>GET</b></h6>
      <p>Access : https://localhost:8000/api/club</p>
      <h6><b>POST</b></h6>
      No header, just input body
      <p>Access : https://localhost:8000/api/club</p>
      <p>Body :</p>
      <ol>
        <li>clubName : (Club Name)</li>
        <li>league : id(league)</li>
      </ol>
      </div>

      <!-- Match -->
      <br />
      <div id="match" class="scrollspy">
      <h5><b>Match</b></h5>
      <p>
        If you add match, it will automatic update table standing for point,
        etc. Be sure you have league and club data.
      </p>
      <h6><b>GET</b></h6>
      <p>Access : https://localhost:8000/api/match</p>
      <h6><b>POST</b></h6>
      No header, just input body
      <p>Access : https://localhost:8000/api/json</p>
      <p>Body :</p>
      <ol>
        <li>league : id(league)</li>
        <li>
          clubHome : (club home)
          <small><i>*Name should be same with club data</i></small>
        </li>
        <li>
          clubAway : (club away)
          <small><i>*Name should be same with club data</i></small>
        </li>
        <li>scorName : (scor Name)</li>
        <li>scorName : (scor Name)</li>
      </ol>
      </div>  

      <!-- Standing -->
      <br />
      <div id="standing" class="scrollspy">
      <h5><b>Standing</b></h5>
      <p>
        Be sure club data is exist. And if you want to update point just input a
        match data.
      </p>
      <h6><b>GET</b></h6>
      <p>Access : https://localhost:8000/api/<b>idleague</b>/all</p>
      <p>&nbsp;<i>Example :</i> https://localhost:8000/api/<b>1</b>/all</p>
      <p>Access : https://localhost:8000/api/<b>idleague</b>/club</p>
      <p>
        &nbsp; <i>Example :</i> https://localhost:8000/api/<b>1</b>/manchester
        united
      </p>
      <p>&nbsp; <i>Example :</i> https://localhost:8000/api/<b>1</b>/chelsea</p>
      </div>

      <h5 class="center-align">Enjoy my Mini Project</h5>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".materialboxed").materialbox();
      });
      
      $(document).ready(function(){
        $('.scrollspy').scrollSpy();
      });
        
    </script>
  </body>
</html>
