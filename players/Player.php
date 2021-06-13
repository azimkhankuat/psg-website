<?php
class Player
{
    function __construct(){
        $this->team = "PSG";
        $this->league = "League-1";
    }

    function same_for_all_players(){
        echo "<h3>Same information for all players: </h3>
            <b>Team: </b>".$this->team.
            "<br><b>League: </b>".$this->league;
    }
}
?>