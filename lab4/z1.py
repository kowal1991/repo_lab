import collections
import string

ciphertexts = []

target = "10001010 10101100 00111011 00001011 10111101 10010111 01001100 10011100 10101010 11111100 00100010 11110000 01111000 00110101 10100001 10101000 11101111 00100110 11011011 10101101 10000010 11011111 11011100 10110000 01101001 10011111 11110100 11001010 01100010 00000001 00010110 11111001 00010110 10100001 10101000 00011010 10100011 01101101 11101100 11101001 01001001 01100101 11101010 00100100 11010010 11100000 00000100 11001011 11100010 10111001 11000110 01011000 10100110 01000100 00101000 00001001"
target_bytes = ""


def strxor(a, b):
    return "".join([chr(ord(x) ^ ord(y)) for (x, y) in zip(a, b)])


for binchar in target.split(" "):
    target_bytes += chr(int(binchar, 2))

with open("data", "r") as f:
    i = 0
    for line in f:
        # if i == 5: break
        # i+=1
        ciphertext = ""
        for binchar in line.split(' '):
            ciphertext += chr(int(binchar, 2))
        ciphertexts.append(ciphertext)

key = ['\x00'] * max(map(len, ciphertexts))
key_mask = [False] * len(key)
key_data=[[] for _ in range(max(map(len, ciphertexts)))]


t = [ord(c) ^ ord(' ') for c in string.ascii_letters]


for i, ciphertext in enumerate(ciphertexts):
    counter = collections.Counter()

    for j, ciphertext2 in enumerate(ciphertexts):
        if i == j:
            continue
        for k, char in enumerate(strxor(ciphertext, ciphertext2)):
            if ord(char) in t:
                counter[k] += 1

    spaces = []

    for k, v in counter.items():
        if v >= len(ciphertexts)*0.8:
            spaces.append((k, v))

    ciphertext_spaces = strxor(ciphertext, " " * len(ciphertext))

    for k, v in spaces:
        key_mask[k] = True
        key[k] = ciphertext_spaces[k]
        key_data[k].append((v, ciphertext_spaces[k]))


for i, arr in enumerate(key_data):
    if len(arr) > 0:
        key[i] = sorted(arr, key=lambda tup: tup[0], reverse=True)[0][1]


manual_fixes = [
    # "Jesli zdobedziemy wladze, memy z Aleksandrem Kwasniewskim beda sie pojawiac nie tylko w piateczek * oznajmila wywolujac dziki entuzjazm na sali",
    # "UE sie zgodzila i przelala mu 600 mln zl Az dziwne, ze nikt na to wczesniej nie wpadl. Jak sie zyje z kupa pieniedzy na koncie? ",
]

for j, m in enumerate(manual_fixes):
    for i, c in enumerate(m):
        if c != "*":
            key_mask[i] = True
            key[i] = chr(ord(c) ^ ord(ciphertexts[j][i]))



result = strxor(key, target_bytes)

print(''.join([result[i] if key_mask[i] else "*" for i, c in enumerate(result)]))

for ciphertext in ciphertexts:
    result = strxor(key, ciphertext)

    print(''.join([result[i] if key_mask[i] else "*" for i, c in enumerate(result)]))


print("asd")