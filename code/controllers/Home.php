<?php
declare(strict_types=1);

namespace WE\Extension\Controller;

use Webiik\Router\Route;
use Webiik\Translation\Translation;
use Webiik\View\View;

class Home
{
    /**
     * @var View
     */
    private $view;

    /**
     * @var Translation
     */
    private $translation;

    /**
     * @var Route
     */
    private $route;

    public function __construct(View $view, Translation $translation, Route $route)
    {
        $this->view = $view;
        $this->translation = $translation;
        $this->route = $route;
    }

    /**
     * @param \Webiik\Data\Data $data
     */
    public function run(\Webiik\Data\Data $data): void
    {
        // Get all translations associated with current route
        $translations = $this->translation->getAll();

        // Update translation(s)
        $translations['txt'] = $this->translation->get('txt', ['routeName' => $this->route->getName()]);

        // Render template
        echo $this->view->render('home.twig', $translations);
    }
}