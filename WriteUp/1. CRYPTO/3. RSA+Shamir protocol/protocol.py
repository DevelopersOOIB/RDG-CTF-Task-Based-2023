from Cryptodome.Util.number import getPrime, inverse, long_to_bytes, bytes_to_long

FLAG = b'RDGCTF{The_RSA_cipher_is_not_suitable_for_this_protocol}'

def main():
    M = bytes_to_long(FLAG)
    
    p = getPrime(1024)
    q = getPrime(1024)
    n = p*q
    e1 = getPrime(64)
    d1 = inverse(e1, (p-1)*(q-1))
    e2 = getPrime(64)
    d2 = inverse(e2, (p-1)*(q-1))

    print(f'n = {n}\ne1 = {e1}\ne2 = {e2}')

    C1 = pow(M, e1, n)
    print(f"A -> B: {C1}")

    C12 = pow(C1, e2, n)
    print(f"B -> A: {C12}")

    C2 = pow(C12, d1, n)
    print(f"A -> B: {C2}")

if __name__ == "__main__":
    main()
