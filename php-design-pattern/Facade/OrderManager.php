<?php

require_once 'Order.php';
require_once 'ItemDao.php';
require_once 'OrderDao.php';

// Facade
// Façadeパターンを適用しない場合、これらの処理を呼び出すコードをクライアント側に記述する必要があります。
// これでは、利用側は「注文処理」でおこなう処理や順序を全て知っている必要があり、
// クライアントとそれぞれの処理を担当するクラスの結びつきが強くなってしまいます。

class OrderManager
{
    public static function order(Order $order)
    {
        $item_dao = ItemDao::getInstance();
        // orderの在庫引き当て
        foreach ($order->getItems() as $order_item) {
            $item_dao->setAside($order_item);
        }

        // orderの登録
        OrderDao::createOrder($order);
    }
}
