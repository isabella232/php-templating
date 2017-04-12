<?php

namespace Emartech\Response;

class View
{
    public function render(callable $template)
    {
        ob_start();
        $template($this);
        return ob_get_clean();
    }

    public function renderJsResources(array $resources)
    {
        foreach ($resources as $resource) { ?>
            <script type="text/javascript" src="<?= $resource ?>?<?= time() ?>"></script>
        <?php }
    }

    public function renderCssResources(array $resources)
    {
        foreach ($resources as $resource) { ?>
            <link rel="stylesheet" type="text/css" href="<?= $resource ?>?<?= time() ?>">
        <?php }
    }

    public function renderJsVariables(array $variables)
    {
        foreach ($variables as $variable => $value) {
            echo "var $variable = " . $this->jsValue($value) . ";\n";
        }
    }

    private function jsValue($value)
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_string($value)) {
            return "'" . $value . "'";
        } elseif (is_object($value) || is_array($value)) {
            return json_encode($value);
        } elseif (is_null($value)) {
            return 'null';
        } elseif (is_numeric($value)) {
            return $value;
        }

        return 'undefined';
    }
}
