<?php
class View
{
    public function generate($contentView, $templateView, $data = null)
    {
        include 'application/views/' . $templateView;
    }
}
?>