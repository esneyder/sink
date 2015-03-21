<?php

class Admin extends App_Admin {

    function init() {
        parent::init();

        $this->api->pathfinder
            ->addLocation(array(
                'addons' => array('addons', 'vendor'),
            ))
            ->setBasePath($this->pathfinder->base_location->getPath() . '/..')
        ;

        $this->template->set('css','compact.css');

        $sm = $this->api->menu->addMenu('Core Features');

        $sm ->addMenuItem('core/hello', 'Hello World');
        $sm ->addMenuItem('core/form', 'Basic Form');

        $sm = $this->api->menu->addMenu('JavaScript');

        $sm ->addMenuItem('js/timepicker', 'TimePicker');
        $sm ->addMenuItem('js/boys-n-girls', 'Boys and Girls');

        $sm = $this->api->menu->addMenu('Real-time components');

        $sm ->addMenuItem('realtime/console', 'Real-time console');

        $sm = $this->api->menu->addMenu('Miscelanious');

        $sm ->addMenuItem('misc/alertbutton', 'Alert Button');
        $sm ->addMenuItem('misc/virtual-pages', 'Virtual Pages');

        try {
            $this->dbConnect();
        } catch(BaseException $e){
            $this->layout->add('Button',null,'User_Menu')
                ->set(['Set up Database', 'swatch'=>'red', 'icon'=>'attention'])
                ->link('/db')
                ->setAttr('title', $e->getText())
                ->js(true)->tooltip();

            // unable to connect.
        }

    }
}

