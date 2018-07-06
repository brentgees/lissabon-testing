<?php

namespace Drupal\lissabon;

/**
 * Defines a Lissabon class.
 */
class Lissabon {
  private $total = 0;

  /**
   * Returns the total amount.
   *
   * @return int
   *   Returns the total
   */
  public function getTotal() {
    return $this->total;
  }

  /**
   * Sets the total.
   *
   * @param int $amount
   *   Amount to be set.
   */
  public function setTotal($amount) {
    $this->total = $amount;
  }

  /**
   * Adds an amount to the total.
   *
   * @param int $amount
   *   Amount to be added.
   */
  public function addToTotal($amount) {
    $this->total = $this->getTotal() + $amount;
  }

}
