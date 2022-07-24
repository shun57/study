import os
import socket
from datetime import datetime

class WebServer:
    """
    Webサーバーを表すクラス
    """

    # 実行ファイルのあるディレクトリ
    BASE_DIR = os.path.dirname(os.path.abspath(__file__))
    # 静的配信するファイルを置くディレクトリ
    STATIC_ROOT = os.path.join(BASE_DIR, "static")
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


            request_line, remain = request.split(b"\r\n", maxsplit=1)
            request_header, request_body = remain.split(b"\r\n\r\n", maxsplit=1)
            # リクエストラインをパースする
            method, path, http_version = request_line.decode().split(" ")

            # pathの先頭の/を削除し、相対パスにしておく
            relative_path = path.lstrip("/")
            # ファイルのpathを取得
            static_file_path = os.path.join(self.STATIC_ROOT, relative_path)

            try:
                # ファイルからレスポンスボディを生成
                with open(static_file_path, "rb") as f:
                    response_body = f.read()

                # レスポンスラインを生成
                response_line = "HTTP/1.1 200 OK\r\n"
            except OSError:
                response_body = b"<html><body><h1>404 Not Found</h1></body></html>"
                response_line = "HTTP/1.1 404 Not Found\r\n"
    
            # レスポンスヘッダーを生成
            response_header = ""
            response_header += f"Date: {datetime.utcnow().strftime('%a, %d %b %Y %H:%M:%S GMT')}\r\n"
            response_header += "Host: HenaServer/0.1\r\n"
            response_header += f"Content-Length: {len(response_body)}\r\n"
            response_header += "Connection: Close\r\n"
            response_header += "Content-Type: text/html\r\n"

            response = (response_line + response_header + "\r\n").encode() + response_body

            # レスポンス送信
            client_socket.send(response)

            # 通信終了
            client_socket.close()

        except Exception as e:
            print(e)

        finally:
            print("=== サーバーを停止します ===")

if __name__ == '__main__':
    server = WebServer()
    server.serve()