<?php


namespace views;


class view
{
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function renderPage(string $template, array $vars = [])
    {
        extract($vars);
        require_once $_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $template;
    }
}