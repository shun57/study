<?php

class SingletonSample
{
    private $id;

    /**
     * 唯一インスタンスを保持する変数
     */
    private static $instance;

    /**
     * IDとして生成日時のハッシュ値を作成
     */
    private function __construct()
    {
        $this->id = md5(date('r') . mt_rand());
    }

    /**
     * 唯一のインスタンスを返すためのメソッド
     * @return SingletonSampleインスタンス
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new SingletonSample();
            echo 'a SingletonSample instance was created!';
        }
        return self::$instance;
    }


    public function getID()
    {
        return $this->id;
    }

    /**
     * 複製を許可しない
     * @throws RuntimeException
     */
    final public function __clone()
    {
        throw new RuntimeException('Clone is not allowed against ' . get_class($this));
    }
}
