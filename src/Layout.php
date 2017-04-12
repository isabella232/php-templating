<?php

namespace Emartech\Response;

class Layout
{
    /**
     * @var ViewComponent
     */
    private $page;


    public function __construct(ViewComponent $page)
    {
        $this->page = $page;
    }

    public function __invoke(View $view)
    {
        ?>
        <!DOCTYPE html>
        <!--[if IE 9]>
        <html class="ie9"><![endif]-->
        <!--[if gt IE 9]><!-->
        <html> <!--<![endif]-->

        <head>
            <?php
                $view->renderCssResources($this->page->getCssResources());
            ?>
        </head>

        <body class="e-bodyshame">

            <?php $this->page->renderContent($view); ?>

            <?php
                $view->renderJsResources($this->page->getJsResources());
            ?>

            <?php $this->page->renderScript($view) ?>
        </body>
        </html>
        <?php
    }
}
