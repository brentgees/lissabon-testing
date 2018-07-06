<?php

namespace Drupal\lissabon;

use Drupal\Tests\UnitTestCase;

/**
 * Defines a Unit class.
 *
 * @group lissabon
 */
class LissabonSumTest extends UnitTestCase {
  protected $lissabon;

  /**
   * Before a test method is run, setUp() is invoked.
   *
   * We create a new object of the class Lissabon.
   */
  public function setUp() {
    $this->lissabon = new Lissabon();
  }

  /**
   * We unset the lissabon object.
   *
   *  Once test method has finished running, whether it succeeded or
   *  failed, tearDown() will be invoked.
   */
  public function tearDown() {
    unset($this->lissabon);
  }

  /**
   * Covers setTotal.
   */
  public function testSetTotal() {
    $this->assertEquals('0', $this->lissabon->getTotal());
    $this->lissabon->setTotal(366);
    $this->assertEquals(366, $this->lissabon->getTotal());
  }

  /**
   * Covers getTotal.
   */
  public function testGetTotal() {
    $this->lissabon->setTotal(366);
    $this->assertNotEquals(200, $this->lissabon->getTotal());
  }

  /**
   * Covers addToTotal.
   */
  public function testAddToTotal() {
    $this->lissabon->setTotal(200);
    $this->lissabon->addToTotal(166);
    $this->assertEquals(366, $this->lissabon->getTotal());
  }

}
