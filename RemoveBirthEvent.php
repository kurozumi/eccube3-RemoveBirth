<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Plugin\RemoveBirth;

use Eccube\Application;
use Eccube\Event\TemplateEvent;

/**
 * Description of RemoveBirthEvent
 *
 * @author kurozumi
 */
class RemoveBirthEvent
{
    /** @var  \Eccube\Application $app */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        
        $this->plugin = $app['orm.em']
                ->getRepository('Eccube\Entity\Plugin')
                ->findOneBy(array('code' => 'RemoveBirth'));
    }

    public function onRenderEntry(TemplateEvent $event)
    {
        if(is_null($this->plugin))
            return;
        
        $search = "{% block javascript %}";
        $tag = <<< EOT
<script>$(function(){ $("#top_box__birth dl:first-child").remove();});</script>\n
EOT;
        $source = str_replace($search, $search . $tag, $event->getSource());
        $event->setSource($source);

    }

    public function onRenderEntryConfirm(TemplateEvent $event)
    {
        if(is_null($this->plugin))
            return;
        
        $script = <<< EOT
{% block javascript %}
<script>$(function(){ $("#confirm_box__birth").remove();});</script>\n
{% endblock javascript %}
EOT;
        $event->setSource($event->getSource() . $script);

    }

    public function onRenderCustomerEdit(TemplateEvent $event)
    {
        if(is_null($this->plugin))
            return;
        
        $search = "{% block javascript %}";
        $tag = <<< EOT
<script>$(function(){ $("#detail_box__birth").remove();});</script>\n
EOT;
        $source = str_replace($search, $search . $tag, $event->getSource());
        $event->setSource($source);

    }

}
