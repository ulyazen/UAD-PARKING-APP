<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Template
{
    /**
     * set template data
     *
     * @var array
     */
    public $templateData = [];

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->templateData[$name] = $value;
    }

    /**
     * to load view
     *
     * @param  string  $template
     * @param  string  $view
     * @param  array   $viewData
     * @param  boolean $return
     * @return void
     */
    public function load($template = '', $view = '', $viewData = [], $return = false)
    {
        $this->CI = &get_instance();
        $this->set('contents', $this->CI->load->view($view, $viewData, true));
        return $this->CI->load->view($template, $this->templateData, $return);
    }

}
