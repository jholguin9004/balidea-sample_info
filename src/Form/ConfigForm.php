<?php

namespace Drupal\sample_info\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConfigForm.
 *
 * The configuration form of Sample Info.
 *
 * @package Drupal\sample_info\Form
 */
class ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      SAMPLE_INFO_CONFIG_KEY,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return SAMPLE_INFO_CONFIG_KEY;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(SAMPLE_INFO_CONFIG_KEY);
    $text = $config->get('info_text');
    $form['info_text'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Information text'),
      '#description' => $this->t('Add text you want to show in frontend.'),
      '#default_value' => $text['value'] ?? '',
      '#rows' => 10,
      '#format' => $text['format'] ?? '',
      '#required' =>  true
    ];

    $form['info_integer'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Integer number'),
      '#description' => $this->t('Add an integer number.'),
      '#default_value' => $config->get('info_integer') ?? '',
      '#required' =>  true
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    //check integer
    $intValue = $form_state->getValue('info_integer');
    if($intValue != filter_var($form_state->getValue('info_integer'), FILTER_SANITIZE_NUMBER_INT)) {
      $form_state->setErrorByName('info_integer', t('Invalid integer number.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $settings = $this->configFactory->getEditable(SAMPLE_INFO_CONFIG_KEY);
    // Save configurations.
    $settings
      ->set('info_text', $form_state->getValue('info_text'))
      ->set('info_integer', $form_state->getValue('info_integer'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
