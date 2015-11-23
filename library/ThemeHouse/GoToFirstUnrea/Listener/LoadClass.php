<?php

class ThemeHouse_GoToFirstUnrea_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_GoToFirstUnrea' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Post'
                ),
            ),
        );
    }

    public static function loadClassController($class, array &$extend)
    {
        $extend = self::createAndRun('ThemeHouse_GoToFirstUnrea_Listener_LoadClass', $class, $extend, 'controller');
    }
}