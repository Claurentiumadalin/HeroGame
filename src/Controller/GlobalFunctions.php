<?php

 function CalculateChance($ChancePercentage)
  {
    $randomNumber = rand ( 0 , 100 );
    //Probability of this event to happen is = $ChancePercentage
    if($randomNumber < $ChancePercentage) return true;
    else return false;
  }

  function SetUpStatsTable(Hero $hero, Beast $beast ){

    //Hero stats
    $heroHealth = $hero->Health;
    $heroStrength = $hero->Strength;;
    $heroDefense = $hero->Defense;
    $heroSpeed = $hero->Speed;
    $heroLuck =$hero->Luck;

      //Beast stats
    $beastHealth = $beast->Health;
    $beastStrength = $beast->Strength;
    $beastDefense = $beast->Defense;
    $beastSpeed = $beast->Speed;
    $beastLuck  =$beast->Luck;

    include_once "View\Table.php";
  }


?>
