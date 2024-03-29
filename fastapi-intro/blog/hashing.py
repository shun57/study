from passlib.context import CryptContext

pwd_context = CryptContext(schemes=["bcrypt"], deprecated="auto")


class Hash():
    def bcrypt(password: str):
        return pwd_context.hash(password)

    def verifty(hashedpassword: str, password: str):
        return pwd_context.verify(password, hashedpassword)
