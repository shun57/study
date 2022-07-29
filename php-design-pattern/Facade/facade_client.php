<?php

require_once 'Order.php';
require_once 'OrderItem.php';
require_once 'ItemDao.php';
require_once 'OrderManager.php';

// Façadeパターンを適用して「注文する」というAPI（ここではorderメソッド）を用意することで、
// クライアント側はそのAPIを使うだけのシンプルなコードなり、またFaçadeクラスだけに依存するコードになります。

$order = new Order();
$item_dao = ItemDao::getInstance();

// オーダーの商品情報を探して加える
$order->addItem(new OrderItem($item_dao->findById(1), 2));
$order->addItem(new OrderItem($item_dao->findById(2), 1));
$order->addItem(new OrderItem($item_dao->findById(3), 3));

/**
 * 注文処理はこの1行だけ
 */
OrderManager::order($order);
