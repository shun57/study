from os import stat
from typing import Callable, Optional

from henago.http.request import HTTPRequest
from henago.http.response import HTTPResponse
from henago.views.static import static
from urls import url_patterns


class URLResolver:
    def resolve(self, request: HTTPRequest) -> Callable[[HTTPRequest], HTTPResponse]:
        """
        URL解決を行う
        pathにマッチするURLパターンが存在した場合は、対応するviewを返す
        存在しなかった場合は、Noneを返す
        """
        for url_pattern in url_patterns:
            match = url_pattern.match(request.path)
            if match:
                request.params.update(match.groupdict())
                return url_pattern.view

        return static
