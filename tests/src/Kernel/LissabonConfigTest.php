<?php

namespace Drupal\lissabon;

use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the config for Lissabon.
 *
 * @package Drupal\lissabon
 */
class LissabonConfigTest extends KernelTestBase {


  /**
   * User for testing.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $testUser;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'system',
    'user',
    'lissabon',
  ];

  /**
   * Sets up the test.
   */
  protected function setUp() {
    /** @var \Drupal\user\RoleInterface $role */
    parent::setUp();
    // We install the config of this module, otherwise the default value won't
    // be set.
    $this->installConfig(['lissabon']);
  }

  /**
   * Tests the default config.
   */
  public function testDefaultLissabonConfig() {
    $config = $this->config('lissabon.settings');
    $lissabon_name = $config->get('lissabon_name');
    $this->assertEquals('Dev days is awesome!', $lissabon_name);
  }

  /**
   * Tests changing the config.
   */
  public function testChangeLissabonConfig() {
    // First we check if the config is the default one.
    $config = $this->config('lissabon.settings');
    $lissabon_name = $config->get('lissabon_name');
    $this->assertEquals('Dev days is awesome!', $lissabon_name);

    // We change the config.
    \Drupal::configFactory()
      ->getEditable('lissabon.settings')
      ->set('lissabon_name', 'Lissabon is awesome!')
      ->save();

    // We check if the config has changed.
    $lissabon_name = $config->get('lissabon_name');
    $this->assertEquals('Lissabon is awesome!', $lissabon_name);
  }

}
