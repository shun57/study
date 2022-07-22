<?php

abstract class AbstractDisplay
{
    private $display_data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->display_data = $data;
    }

    /**
     * template method
     */
    public function display()
    {
        $this->displayHeader();
        $this->displayBody();
        $this->displayFooter();
    }

    public function getData()
    {
        return $this->display_data;
    }

    /**
     * ヘッダーを表示
     */
    abstract protected function displayHeader();

    /**
     * ボディを表示
     */
    abstract protected function displayBody();

    /**
     * フッターを表示
     */
    abstract protected function displayFooter();
}
