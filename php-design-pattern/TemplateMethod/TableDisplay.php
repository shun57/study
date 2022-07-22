<?php

require_once 'AbstractDisplay.php';

class TableDisplay extends AbstractDisplay
{
    /**
     * ヘッダー
     */
    protected function displayHeader()
    {
        echo '<table border="1" cellpadding="2" cellspacing="2">';
    }

    /**
     * ボディ
     */
    protected function displayBody()
    {
        foreach ($this->getData() as $key => $value) {
            echo '<tr>';
            echo '<th>' . $key . '</th>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
    }

    /**
     * フッタ
     */
    protected function displayFooter()
    {
        echo '</table>';
    }
}
