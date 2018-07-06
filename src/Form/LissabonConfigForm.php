<?php

namespace Drupal\lissabon\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a Configuration form.
 */
class LissabonConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'lissabon_config_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'lissabon.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('lissabon.settings');
    $lissabon_name = $config->get('lissabon_name');
    $form['lissabon_name'] = [
      '#type' => 'textfield',
      '#default_value' => isset($lissabon_name) ? $lissabon_name : '',
      '#title' => $this->t('Fill in a name'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Save the form values in config.
    $lissabon_name = $form_state->getValue('lissabon_name');
    \Drupal::configFactory()
      ->getEditable('lissabon.settings')
      ->set('lissabon_name', $lissabon_name)
      ->save();
    parent::submitForm($form, $form_state);
  }

}
