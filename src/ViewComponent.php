<?php

namespace Emartech\Response;

interface ViewComponent
{
    public function getCssResources(): array;

    public function getJsResources(): array;

    public function renderContent(View $view);

    public function renderScript(View $view);
}
