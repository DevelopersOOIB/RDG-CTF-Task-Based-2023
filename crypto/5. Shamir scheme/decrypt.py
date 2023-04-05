
x = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256]
F_x = [51, 197, 38, 177, 35, 15, 174, 230, 28, 180, 68, 216, 189, 87, 145, 99, 9, 134, 251, 226, 86, 133, 91, 121, 251, 40, 50, 114, 31, 189, 226, 103, 243, 168, 224, 159, 105, 133, 79, 221, 253, 170, 41, 14, 252, 194, 114, 61, 139, 236, 165, 219, 69, 60, 101, 167, 115, 187, 62, 55, 128, 42, 225, 181, 20, 22, 230, 68, 228, 90, 21, 97, 91, 254, 192, 194, 88, 140, 83, 153, 30, 138, 18, 90, 64, 247, 127, 198, 113, 39, 181, 238, 12, 97, 13, 37, 216, 44, 210, 42, 212, 66, 232, 102, 187, 205, 220, 166, 58, 225, 130, 77, 253, 235, 115, 145, 30, 96, 126, 211, 78, 72, 71, 101, 74, 70, 171, 124, 65, 70, 102, 92, 113, 108, 93, 7, 106, 143, 112, 188, 164, 87, 25, 145, 143, 133, 165, 42, 148, 201, 31, 43, 130, 87, 56, 17, 65, 23, 22, 92, 64, 249, 7, 29, 38, 39, 212, 191, 103, 71, 66, 218, 238, 120, 204, 175, 168, 180, 83, 249, 181, 228, 97, 229, 11, 219, 29, 56, 250, 82, 224, 166, 192, 52, 236, 246, 107, 169, 120, 231, 154, 77, 161, 45, 55, 94, 157, 109, 78, 52, 90, 101, 95, 117, 83, 79, 175, 162, 109, 19, 150, 211, 52, 224, 158, 186, 65, 50, 195, 203, 144, 67, 201, 219, 129, 222, 103, 118, 87, 150, 99, 112, 7, 188, 113, 30, 210, 221, 148, 143, 176, 139, 240, 53, 77, 217]

p = 257

def Method_Gauss(A, B):
    for i in range(len(B)):
        
        j = i
        while A[j][i] == 0:
            j += 1
        for k in range(len(A[i])):
            A[i][k], A[j][k] = A[j][k], A[i][k]
        B[i], B[j] = B[j], B[i]
        m = pow(A[i][i], -1, p)
        for k in range(len(A[i])):
            A[i][k] = (A[i][k] * m) % p
        B[i] = (B[i] * m) % p

        for j in range(i):
            m = A[j][i]
            for k in range(len(A[i])):
                A[j][k] = (A[j][k] - A[i][k]*m) % p
            B[j] = (B[j] - B[i] * m) % p

        for j in range(i+1, len(A)):
            m = A[j][i]
            for k in range(len(A[i])):
                A[j][k] = (A[j][k] - A[i][k]*m) % p
            B[j] = (B[j] - B[i] * m) % p

    return B
        

def main():
    B = F_x
    A = [0]*len(F_x)
    for i in range(len(x)):
        A[i] = [pow(x[i], j, p) for j in range(len(F_x))]
    B = Method_Gauss(A, B)
    print(bytes(B))

if __name__ == "__main__":
    main()