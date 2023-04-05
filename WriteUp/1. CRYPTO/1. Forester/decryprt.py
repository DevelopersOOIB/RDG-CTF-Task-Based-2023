
def main():
    with open("encFlag.png", 'rb') as file:
        ciphertext = file.read()
    text = bytes([0x89])
    for i in range(1, len(ciphertext)):
        text += bytes([ciphertext[i] ^ text[i-1]])
    with open("Flag1.png", 'wb') as file:
        file.write(text)

if __name__ == "__main__":
    main()
