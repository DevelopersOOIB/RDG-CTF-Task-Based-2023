from Cryptodome.Util.number import getPrime, bytes_to_long, inverse
from random import randint

flag = b"RDGCTF{f3rmAt_smAl1_th30r3m}"

def Genkey(L):
    p = getPrime(L)
    q = getPrime(L)
    n = p*q
    g = randint(1, n-1)
    r_p = pow(g, p-1, n)
    r_q = pow(g, q-1, n)
    Openkey = [r_p, r_q, n]
    Secretkey = [p, q]
    return Openkey, Secretkey

def encrypt(Openkey, m):
    c1 = (m * Openkey[0]) % Openkey[2]
    c2 = (m * Openkey[1]) % Openkey[2]
    return c1, c2

def decrypt(Secretkey, c1, c2):
    m = (c1*Secretkey[1]*inverse(Secretkey[1], Secretkey[0]) + c2*Secretkey[0]*inverse(Secretkey[0], Secretkey[1])) % (Secretkey[0] * Secretkey[1])
    return m

def main():
    Openkey, Secretkey = Genkey(1024)
    print(f"r_p = {Openkey[0]}\nr_q = {Openkey[1]}\nn = {Openkey[2]}")
    m = bytes_to_long(flag)
    c1, c2 = encrypt(Openkey, m)
    print(f"c1 = {c1}\nc2 = {c2}")

if __name__ == "__main__":
    main()
