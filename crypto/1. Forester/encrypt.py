from random import randint

def main():
    with open("Flag.png", "rb") as file:
        text = file.read()
    ciphertext = b''
    for i in range(len(text)-1, 0, -1):
        ciphertext += bytes([text[i] ^ text[i-1]])
    ciphertext += bytes([text[0] ^ randint(0, 255)])
    ciphertext = ciphertext[::-1]
    with open("encFlag.png", "wb") as file:
        file.write(ciphertext)

if __name__ == "__main__":
    main()
