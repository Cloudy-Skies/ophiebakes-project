<?php
//this page is aware of the controller

//run the select controller

//display records
function display_all_contact_fxn()
{
    # code...
    $run_item = get_all_contact_ctr();

    if($run_item){

        echo 'some data retrieved';
        echo '<br>';
        // echo $run_item;
        foreach ($run_item as $acontact) {
                echo $acontact['pname']." ".$acontact['pphoned'];

                echo "DELECT | UPDATE";
                echo "<br>";
        }
    }
    else {
        echo 'no contact found';
    }
}



?>