input_str = input()

count = 0

for symbol in input_str:
    if (symbol == '('):
        count += 1
    if (symbol == ')'):
        count -= 1
    if (count < 0):
        break

if (count == 0):
    print(True)
else:
    print(False)