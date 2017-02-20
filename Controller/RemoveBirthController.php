<?php

/*
 * This file is part of the RemoveBirth
 *
 * Copyright (C) 2017 生年月日削除プラグイン
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\RemoveBirth\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;

class RemoveBirthController
{

    /**
     * RemoveBirth画面
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {

        // add code...

        return $app->render('RemoveBirth/Resource/template/index.twig', array(
            // add parameter...
        ));
    }

}
