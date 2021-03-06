<?php
namespace Ads;

abstract class MJML
{
    /**
     * @param string $mjml MJML formated string
     * @return string HTML formated string
     */
    public static function getRender(string $mjml){
        $renderer = new \Qferrer\Mjml\Renderer\BinaryRenderer(dirname(dirname(dirname(__FILE__))).'/node_modules/.bin/mjml');
        return $renderer->render($mjml);
    }
}