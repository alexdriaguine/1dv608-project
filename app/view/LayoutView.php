<?php

namespace view;

/**
 * Class LayoutView
 * Basic layout for a HTML-page
 * @package view
 */
class LayoutView  {

    /**
     * Title of the application
     * @var string
     */
    private static $title = "AppYo";

    /**
     * @var NavigationView
     */
    private $navigationView;

    public function __construct(NavigationView $navigationView) {
        $this->navigationView = $navigationView;
    }

    public function render($html) {

        echo '<!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>' . self::$title . '</title>
                </head>
                <body>
                    <header>
                        <h1>Hello ProjectApp</h1>
                    </header>
                    <nav>
                        <ul>
                            <li>' . $this->navigationView->getLinkToHome() . '</li>
                            <li>' . $this->navigationView->getLinkToAddBeer() . '</li>
                            <li>' . $this->navigationView->getLinkToPubList() . '</li>
                        </ul>
                    </nav>

                    <div class="container">
                        ' . $html .'
                    </div>

                    <footer>
                        <p>Application created for the course 1dv608 - Web development with PHP at Linneaus Univercity by Alex Driaguine</p>
                        <p>Å Ä Ö LOL</p>
                    </footer>

                </body>
            </html>';
    }
}