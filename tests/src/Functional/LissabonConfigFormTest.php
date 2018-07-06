<?php

namespace Drupal\lissabon;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the config form.
 *
 * @package Drupal\lissabon
 */
class LissabonConfigFormTest extends BrowserTestBase {

  protected $user;
  protected $editForm;


  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['lissabon'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->user = $this->drupalCreateUser(['administer site configuration']);
    $this->drupalLogin($this->user);
  }

  /**
   * Tests the configuration form.
   */
  public function testConfigForm() {
    // We try to change the form on /admin/lissabon.
    $this->editForm = 'admin/lissabon';
    $form = [
      'edit-lissabon-name' => 'Lissabon is awesome',
    ];
    $this->drupalPostForm($this->editForm, $form, 'Save');

    // We check if our change went through.
    $this->drupalGet('admin/lissabon');
    $this->assertResponse(200);
    $config = $this->config('lissabon.settings');
    $this->assertFieldByName('lissabon_name', $config->get('lissabon_name'));
  }

}
