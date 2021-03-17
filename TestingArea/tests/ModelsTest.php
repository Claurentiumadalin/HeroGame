<?php
include_once "..\src\Model\Model.php";
include_once "..\src\Controller\BattleManagement.php";

class ModelsTest extends PHPUnit\Framework\TestCase

{

    public function testModels()
    {
        $hero = $this->Initialise_With_Test_Data_Hero();
        $beast = $this->Initialise_With_Test_Data_Beast();

        //Luck
        $luckHero = CalculateChance($hero->Luck);
        $this->assertEquals(true, $luckHero);

        $luckBeast = CalculateChance($beast->Luck);
        $this->assertEquals(false, $luckBeast);

        //Who attack first
        $heroAttackFirst = SetWhoStartFirst($hero, $beast);
        $this->assertEquals(true, $hero->IsHisTurn);
        $this->assertEquals(false, $beast->IsHisTurn);

        //Set speedhero= speeBeast and test who attack first based on luck
        $hero->IsHisTurn = false;
        $beast->IsHisTurn = false;
        $hero->Speed = 20;
        $beast->Speed = 20;
        $hero->Luck = 0;
        $beast->Luck = 100;
        $heroAttackFirst = SetWhoStartFirst($hero, $beast);
        $this->assertEquals(false, $hero->IsHisTurn);
        $this->assertEquals(true, $beast->IsHisTurn);


        $magicShieldChance = $hero->GetMagicShieldChance();
        $this->assertEquals(20, $magicShieldChance);

        $rapidStrikeChance = $hero->GetRapidStrikeChance();
        $this->assertEquals(10, $rapidStrikeChance);

        $rapiStrikeDamage = $hero->RapidStrike(20);
        $this->assertEquals(40, $rapiStrikeDamage);

        $magicShieldReduction = $hero->MagicShield(34);
        $this->assertEquals(17, $magicShieldReduction);
    }

    private function Initialise_With_Test_Data_Hero()
    {
        $hero = new Hero();

        $hero->Health = 100;
        $hero->Strength = 100;
        $hero->Defense = 100;
        $hero->Speed = 80;
        $hero->Luck = 100;
        $hero->IsHisTurn = false;
        return $hero;
    }

    private function Initialise_With_Test_Data_Beast()
    {
        $beast = new Beast();

        $beast->Health = 100;
        $beast->Strength = 100;
        $beast->Defense = 100;
        $beast->Speed = 50;
        $beast->Luck = 0;
        $beast->IsHisTurn = false;
        return $beast;
    }

}
