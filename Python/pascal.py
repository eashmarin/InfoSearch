import math

def validate(input): 
    try:
        int(input)
    except ValueError:
        print("input must be number")
        exit(-1)

    if (int(input) < 0):
        print("input number must be >= 0")
        exit(-1)

    return int(input)

def binomial_coefficient(m, n):
    return int(math.factorial(n) / (math.factorial(m) * math.factorial(n - m)))

input_str = input()
n = validate(input_str)
outputLine = ""

for i in range(n):
    outputLine = " " * (n - i)
    
    for j in range(i + 1):
        outputLine += str(binomial_coefficient(j, i)) + " "
    
    print(outputLine)