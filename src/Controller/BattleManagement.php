<?php

include_once "..\src\Model\Model.php";
include "GlobalFunctions.php";


function StartFight()
{

    $hero = new Hero;
    $beast = new Beast;
    //Populate table with starting Stats
    SetUpStatsTable($hero, $beast);

    //Set who start first
    SetWhoStartFirst($hero, $beast);
    $gameTurns = 20;

    //local variables
    $totalDamageDealByHero = 0;
    $totalDamageDealByBeast = 0;
    $turns = 0;
    $gameOver = false;

    while ($turns <= $gameTurns && $hero->Health >= 0 && $beast->Health >= 0 && !$gameOver) {

        if ($hero->IsHisTurn && !$gameOver) {

            $damageDealByHero = HeroAttack($hero, $beast);

            if ($beast->Health <= 0) {
                $gameOver = true;
            }
            $totalDamageDealByHero += $damageDealByHero;
            $hero->IsHisTurn = false;
            $beast->IsHisTurn = true;

            $turns += 1;
        }

        //BEAST ATTACK
        if ($beast->IsHisTurn && !$gameOver) {

            $damageDealByBeast = BeastAttack($hero, $beast);

            if ($hero->Health <= 0) {
                $gameOver = true;
            }
            $totalDamageDealByBeast += $damageDealByBeast;
            $hero->IsHisTurn = true;
            $beast->IsHisTurn = false;
            $turns += 1;
        }
    }
    ShowEndMessages($hero, $beast, $totalDamageDealByHero, $totalDamageDealByBeast);

}

function ShowEndMessages(Hero $hero, Beast $beast, $totalDamageDealByHero, $totalDamageDealByBeast)
{
    if ($turns === 20) {
        echo "Game finish by running 20 turns...";
        echo "<br>";
    }

    if ($hero->Health > $beast->Health) {
        echo "<p><b> Hero Orderus win the game!</b>";
    } else {
        echo "<p><b>Beast win the game!</b>";
    }
    echo "<br>";
    echo "<font color=red> Total damage deal by Orderus :</font>", $totalDamageDealByHero;
    echo "<br>";

    echo "<font color=red> Total damage deal by Beast :</font>", $totalDamageDealByBeast;
    echo "<br>";

}

function SetWhoStartFirst(Hero $hero, Beast $beast)
{
    if (($hero->Speed > $beast->Speed) || ($hero->Luck > $beast->Luck)) {
        //Hero attack first
        $hero->IsHisTurn = true;
        $var = "<b>Hero";
    } else {
        //Beast attack first
        $beast->IsHisTurn = true;
        $var ="<b>Beast";
    }
    echo $var , " attack first based on higher speed or luck!</b><p>";
}

function HeroAttack(Hero $hero, Beast $beast)
{
    $canUseRapidStrike = CalculateChance($hero->GetRapidStrikeChance());
    $canUseMagicShield = CalculateChance($hero->GetMagicShieldChance());

    $damageDealByHero = $hero->Strength - $beast->Defense;
    echo "Hero Orderus attack:";
    echo "<br>";

    //Beast Get Lucky and dont take damage from Hero
    $luckyBeast = CalculateChance($beast->Luck);
    if (!$luckyBeast) {

        if ($canUseRapidStrike) {

            echo "Orderus use Rapid Strike ";
            echo "<br>";
            $damageDealByHero = $hero->RapidStrike($damageDealByHero);
        }
        $beast->Health -= $damageDealByHero;
        echo "Damage deal by Orderus: ", $damageDealByHero, " Beast remain Health: ", $beast->Health;
        echo "<br>";
    } else //lucky beast
    {
        $damageDealByHero = 0;
        echo "Beast get lucky and Orderus did 0 damage";
        echo "<br>";
    }

    return $damageDealByHero;

}

function BeastAttack(Hero $hero, Beast $beast)
{
    echo "Beast attack:";
    echo "<br>";
    $damageDealByBeast = $beast->Strength - $hero->Defense;

    //Hero Get Lucky and dont take damage from Beast
    $luckyHero = CalculateChance($hero->Luck);
    if (!$luckyHero) {

        if ($canUseMagicShield) {

            echo "Hero Orderus use magic Shield and take half damage.";
            echo "<br>";
            $damageDealByBeast = $hero->MagicShield($damageDealByBeast);
        }

        $hero->Health -= $damageDealByBeast;
        $heroHealth = $hero->Health;
        echo "Damage deal by Beast: ", $damageDealByBeast, " Orderus remain Health: ", $heroHealth;
        echo "<br>";
    } else {
        $damageDealByBeast = 0;
        echo "Orderus get lucky and Beast did 0 damage";
        echo "<br>";
    }
    return $damageDealByBeast;
}
