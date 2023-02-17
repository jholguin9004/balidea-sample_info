<?php

namespace Drupal\sample_info\Controller;

use Drupal\Core\Controller\ControllerBase;

class SampleInfo extends ControllerBase
{

    /**
     * Renders page content
     *
     * @return void
     */
    public function view()
    {
        $config = $this->config(SAMPLE_INFO_CONFIG_KEY);
        $text = $config->get('info_text');
        return [
            '#theme' => 'sample-info-view',
            '#info_text' => $text['value'] ?? '',
            '#info_text_format' => $text['format'] ?? SAMPLE_INFO_DEFAULT_FORMAT,
            '#info_integer' => $config->get('info_integer') ?? ''
        ];
    }
}
