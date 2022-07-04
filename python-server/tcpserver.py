import socket

class TCPServer:
    """
    TCP通信を行うサーバーを表すクラス
    """
    def serve(self):
        """
        サーバーを起動する
        """

        print("=== サーバーを起動します ===")

        try:
            # socket作成
            server_socket = socket.socket()
            server_socket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)

            # socketをlocalhostポート8080に割り当て
            server_socket.bind(('localhost', 8080))
            server_socket.listen(10)

            # 接続を待ち、コネクションを確立する
            print("=== クライアントからの接続待ち ===")
            (client_socket, address) = server_socket.accept()
            print(f"=== クライアントとの接続が完了しました remote_address: {address} ===")

            # 送られてきたデータを取得、ファイルに書き出す
            request = client_socket.recv(4096)

            with open("server_recv.txt", "wb") as f:
                f.write(request)

            # クライアントへ送信するレスポンスデータをファイルから取得
            with open("server_send.txt", "rb") as f:
                response = f.read()

            # レスポンス送信
            client_socket.send(response)

            # 通信終了
            client_socket.close()

        except Exception as e:
            print(e)

        finally:
            print("=== サーバーを停止します ===")

if __name__ == '__main__':
    server = TCPServer()
    server.serve()