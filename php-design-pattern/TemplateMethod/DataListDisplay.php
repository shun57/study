<?php

require_once 'AbstractDisplay.php';

class DataListDisplay extends AbstractDisplay
{
    /**
     * ヘッダー
     */
    protected function displayHeader()
    {
        echo '<dl>';
    }

    /**
     * ボディ
     */
    protected function displayBody()
    {
        foreach ($this->getData() as $key => $value) {
            echo '<dt>Item ' . $key . '</dt>';
            echo '<dd>' . $value . '</dd>';
        }
    }

    /**
     * フッター
     */
    protected function displayFooter()
    {
        echo '</dl>';
    }
}
