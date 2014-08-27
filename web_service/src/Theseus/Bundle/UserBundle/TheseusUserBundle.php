<?php

namespace Theseus\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TheseusUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}