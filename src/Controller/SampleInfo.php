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
            '#theme' => 'sample_info_view',
            '#info_text' => [
                '#type' => 'processed_text',
                '#text' => $text['value'] ?? '',
                '#format' => $text['format'] ?? SAMPLE_INFO_DEFAULT_FORMAT,
            ],
            '#info_integer' => $config->get('info_integer') ?? ''
        ];
    }
}
