from typing import Optional, Union, List

from henago.http.cookie import Cookie


class HTTPResponse:
    status_code: int
    headers: dict
    cookies: List[Cookie]
    content_type: Optional[str]
    body: Union[bytes, str]

    def __init__(
        self,
        headers: dict = None,
        cookies: List[Cookie] = None,
        status_code: int = 200,
        content_type: str = None,
        body: Union[bytes, str] = b""
    ):
        if headers is None:
            headers = {}
        if cookies is None:
            cookies = []

        self.status_code = status_code
        self.headers = headers
        self.cookies = cookies
        self.content_type = content_type
        self.body = body
