from random import randint

flag = b"RDGCTF{I_love_the_Jordan_Gauss_method}"
p = 257

def P(A, x):
    res = 0
    for i in range(len(A)):
        res = (res + A[i] * pow(x, i, p)) % p
    return res

def Shamir(M, n, t):
    if len(M) > t:
        return None
    A = [randint(0, 255) for i in range(t - len(M))] + M
    x = list(range(1, n+1))
    F_x = [P(A, i) for i in range(1, n+1)]
    return x, F_x
    
def main():
    M = [int(i) for i in flag]
    x, F_x = Shamir(M, 256, 256)
    print(x)
    print(F_x)

if __name__ == "__main__":
    main()
