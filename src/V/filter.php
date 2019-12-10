<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4" style="background-color: #EAEAEB!important;">
            <form action="index.php?controle=filter&action=get_filter" method="post">      
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                        <?php
                         require_once('M/filter_bd.php');
                         $resulat = filtre_age();
                        ?>   
                            <select name="age" class="custom-select">
                                <option value="">----Search by age----</option>
                                <?php
                                foreach ($resulat as $res) {
                                    echo "<option value='".$res."'>" .$res . ' ans'."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm">
                            <select name="interests" class="custom-select">
                                <option value="">----Search by tags----</option>
                                <option value="artist" for="artist">#Artist</option>
                                <option value="worker" for="worker">#Hard worker</option>
                                <option value="athletic" for="athletic">#Athletic</option>
                                <option value="geek" for="geek">#Geek</option>
                                <option value="musician" for="musician">#Musician</option>
                                <option value="traveler" for="traveler">#Traveler</option>
                                <option value="sleeper" for="sleeper">#Sleeper</option>
                                <option value="match" for="match">#Match</option>
                                <option value="cat" for="cat">#Cat</option>
                                <option value="reveler" for="reveler">#Reveler</option>
                                <option value="romantic" for="romantic">#Romantic</option>
                            </select>
                        </div>
                         
                        <div class="col-sm">
                            <?php

                            $location = filtre_location();
                            ?> 
                            <select name="location" class="custom-select">
                                <option value="">----Search by location----</option>
                                <?php
                                foreach ($location as $loc) {
                                    echo "<option value='".$loc."'>" .$loc ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm">
                            <select name="popularity" class="custom-select">
                                <option value="">----Search by popularity----</option>
                                <option value="1">0-100 like</option>
                                <option value="2">100-250 like</option>
                                <option value="3">250-500 like</option>
                                <option value="4">500+ like</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary"  id="btn-account-s">Search</button>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark" style="background-color: #EAEAEB!important;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>
<br>

<style>

#btn-account-s{
    background-color:#E9467C; 
    color:white; 
    border-color:white; 
    border-radius:10px;
    text-align: left;
}

</style>