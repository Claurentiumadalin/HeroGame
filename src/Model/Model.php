<?php

class Character
{
    public int $Health;
    public int $Strength;
    public int $Defense;
    public int $Speed;
    public int $Luck;
    public bool $IsHisTurn;
}

class Hero extends Character implements SkillsInterface
{
    //THIS VALUES SHOULD BE READ FROM STORAGE (DB, FILE,...)
    private $HealthStartRange = 70;
    private $HealthEndRange = 100;

    private $StrengthStartRange = 70;
    private $StrengthEndRange = 80;

    private $DefenseStartRange = 45;
    private $DefenseEndRange = 55;

    private $SpeedStartRange = 40;
    private $SpeedEndRange = 50;

    private $LuckStartRange = 10;
    private $LuckEndRange = 30;

    private $RapidStrikeChance = 10;

    public function GetRapidStrikeChance()
    {
        return $this->RapidStrikeChance;
    }

    private $MagicShieldChance = 20;
    public function GetMagicShieldChance()
    {
        return $this->MagicShieldChance;
    }

    public function __construct()
    {
        $this->Health = rand($this->HealthStartRange, $this->HealthEndRange);
        $this->Strength = rand($this->StrengthStartRange, $this->StrengthEndRange);
        $this->Defense = rand($this->DefenseStartRange, $this->DefenseEndRange);
        $this->Speed = rand($this->SpeedStartRange, $this->SpeedEndRange);
        $this->Luck = rand($this->LuckStartRange, $this->LuckEndRange);
        $this->IsHisTurn = false;
    }

    public function RapidStrike($damageDealByHero)
    {
        return 2 * $damageDealByHero;
    }

    public function MagicShield($damageDealByBeast)
    {
        return $damageDealByBeast / 2;
    }

}

class Beast extends Character
{

    private $HealthStartRange = 60;
    private $HealthEndRange = 90;

    private $StrengthStartRange = 60;
    private $StrengthEndRange = 90;

    private $DefenseStartRange = 40;
    private $DefenseEndRange = 60;

    private $SpeedStartRange = 40;
    private $SpeedEndRange = 60;

    private $LuckStartRange = 25;
    private $LuckEndRange = 40;

    public function __construct()
    {
        $this->Health = rand($this->HealthStartRange, $this->HealthEndRange);
        $this->Strength = rand($this->StrengthStartRange, $this->StrengthEndRange);
        $this->Defense = rand($this->DefenseStartRange, $this->DefenseEndRange);
        $this->Speed = rand($this->SpeedStartRange, $this->SpeedEndRange);
        $this->Luck = rand($this->LuckStartRange, $this->LuckEndRange);
        $this->IsHisTurn = false;
    }

}

interface SkillsInterface
{
    public function RapidStrike($damageDeal);
    public function MagicShield($damageDeal);
}
