
from abc import ABC, abstractmethod


# file_path = "input.txt"
# shift = -1
# lang = "ru"

file_path = input("Путь до файла: ")
shift = int(input("Сдвиг: "))
lang = input("Язык: ")

output_file = open(file_path + "[caesar_cipher_" + lang + "]", "w")

class AbstractCaesarCipher(ABC):
    @abstractmethod
    def condition(self, symbol):
        pass

    @abstractmethod
    def cipher(self, symbol):
        pass

class EnglishCaesarCipher(AbstractCaesarCipher):
    def condition(self, symbol):
        return (ord('a') <= ord(symbol) and ord(symbol) <= ord('z')) or (ord('A') <= ord(symbol) and ord(symbol) <= ord('Z'))
    def cipher(self, symbol):
        if symbol.isupper():
            return chr((ord(symbol) + shift - ord('A')) % 26 + ord('A'))
        return chr((ord(symbol) + shift - ord('a')) % 26 + ord('a'))

    
class RussianCaesarCipher(AbstractCaesarCipher):
    def condition(self, symbol):
        return (ord('а') <= ord(symbol) and ord(symbol) <= ord('я')) or (ord('А') <= ord(symbol) and ord(symbol) <= ord('Я'))
    def cipher(self, symbol):
        if symbol.isupper():
            return chr((ord(symbol) + shift - ord('А')) % 32 + ord('А'))
        return chr((ord(symbol) + shift - ord('а')) % 32 + ord('а'))
    
cypher = EnglishCaesarCipher() if (lang == "en") else RussianCaesarCipher()

with open(file_path) as input_file:
    for line in input_file:
        for symbol in line:
            if (cypher.condition(symbol)):
                output_file.write(cypher.cipher(symbol))
            else:
                output_file.write(symbol)