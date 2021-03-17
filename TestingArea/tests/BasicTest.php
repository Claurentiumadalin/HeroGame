<?php

include_once "..\src\Controller\BattleManagement.php";
include_once "..\src\Model\Model.php";


class BasicTest extends PHPUnit\Framework\TestCase
{
  public function testReturnChance()
  {
    $this->assertEquals(1, 1);
  }

  public function testHero()
  {
    $hero = new Hero();
    $typeHero = get_class($hero);
  
    $this->assertEquals("Hero",  $typeHero);
  }

  public function testBeast()
  {
    $beast = new Beast();
    $typeBeast = get_class($beast);

    $this->assertEquals("Beast", $typeBeast);
  }
}

