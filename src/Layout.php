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
        <html>

        <head>
            <?php
                $view->renderCssResources($this->page->getCssResources());
            ?>
        </head>

        <body>

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
