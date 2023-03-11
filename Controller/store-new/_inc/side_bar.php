<?php
class Sidebar_Link
{
    protected $name;
    protected $href;
    protected $is_active;
    protected $icon;

    function __construct($name, $href, $icon, $is_active = false)
    {
        $this->name = $name;
        $this->href = $href;
        $this->is_active = $is_active;
        $this->icon = $icon;
    }

    function render()
    {
        return '<a href="' . $this->href . '"' . ($this->is_active ? 'class="active"' : '') . '>
                    <i class="fa-solid ' . $this->icon . '"></i>
                    <span>' . $this->name . '</span>
                </a>';
    }
}
function render_side_bar($links)
{
    $links_text = '';
    foreach ($links as $link) {
        $links_text = $links_text . ' ' . $link->render();
    }

    echo '
        <header>
            <a href="/" class="logo">
                <img src="' . $GLOBALS["store_path"] . '/_assets/logo.png" alt="Sales Achieved Logo">
            </a>
            <nav class="tab-links">
                ' . $links_text . '
            </nav>
            <nav class="alt-links">
                <a href="">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Profile</span>
                </a>
                <a href="">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </header>
    ';
}
