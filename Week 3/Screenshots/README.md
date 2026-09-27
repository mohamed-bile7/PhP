# Week 3 — Screenshots

## Overview

This README documents the screenshots inside the **Week 3 / Screenshots** folder for the **PHP & MySQL Course (CA233)**. Each screenshot captures a specific assignment section of code from `index.php`, isolating one problem at a time for review.

The screenshots are numbered and named to reflect the order the assignments appear in `index.php`: finding the greatest/smallest number, divisibility checks, odd/even loops, multiples, string reversal, LCM/HCF, and prime number checking.

| # | Filename | Section Documented |
|---|---|---|
| 1 | `Assignment1.png` | Finding the greatest and smallest of three numbers |
| 2 | `Assignment2.png` | Checking divisibility by 3 and 5 |
| 3 | `Assignment3.png` | Printing odd numbers (2–20) and even numbers (35–7) |
| 4 | `Assignment4.png` | Printing numbers divisible by both 2 and 5 (50 down to 2) |
| 5 | `Assignment5.png` | Reversing a number using a loop |
| 6 | `Assignment6&7.png` | Finding the LCM and HCF of two numbers |
| 7 | `Assignment9.png` | Checking whether a number is prime |

---

## 1. `Assignment1.png` — Greatest and Smallest of Three Numbers

**What this screenshot shows:** the opening section of `index.php`, using nested logical conditions to determine the greatest and smallest of three numbers.

```php
$num1= 12;
$num2= 13;
$num3= 14;

if($num1 >= $num2 && $num1 >= $num3)
   $greatest= $num1;
elseif($num2 >= $num1 && $num2 >= $num3)
    $greatest= $num2;
else
    $greatest= $num3;

if($num1 <= $num2 && $num1 <= $num3)
    $smallest= $num1;
elseif($num2 <= $num1 && $num2 <= $num3)
    $smallest= $num2;
else
    $smallest= $num3;

echo "Greatest number is: $greatest";
echo "Smallest number is: $smallest";
```

**Concepts demonstrated:**

- **Logical AND (`&&`):** Each `if`/`elseif` condition combines two comparisons with `&&`, so a variable is only assigned as the greatest (or smallest) when it satisfies both comparisons at once.
- **`if` / `elseif` / `else` chain:** Two separate chains are used — one to find the greatest value, one to find the smallest — each assigning the result to its own variable (`$greatest`, `$smallest`).
- **Variable comparison:** `$num1`, `$num2`, and `$num3` are compared directly against each other rather than against fixed values.
- **Result for this example:** With `$num1=12`, `$num2=13`, `$num3=14`, the greatest is `14` and the smallest is `12`.

---

## 2. `Assignment2.png` — Divisibility Check (3 and 5)

**What this screenshot shows:** a number tested for divisibility by 3 and 5 using the modulus operator.

```php
$num= 15;
if($num % 3 == 0 && $num % 5 == 0)
    echo "The number $num is diviisible by 3 and 5.";
elseif($num % 3 == 0)
    echo "The number $num is divisible by 3.";
elseif($num % 5 == 0)
    echo "The number $num is divisible by 5.";
else
    echo "The number $num cannot be devided neither 3 nor 5";
```

**Concepts demonstrated:**

- **Modulus operator (`%`):** `$num % 3 == 0` checks whether dividing `$num` by `3` leaves no remainder, i.e. whether `$num` is evenly divisible by `3`.
- **Combined condition:** The first `if` checks divisibility by **both** 3 and 5 using `&&`, before the `elseif` branches check each divisor individually.
- **Branch ordering matters:** Because the combined check comes first, a number divisible by both never falls into the single-divisor branches.
- **Result for this example:** `$num = 15` is divisible by both 3 and 5, so the first branch executes.

---

## 3. `Assignment3.png` — Odd and Even Number Loops

**What this screenshot shows:** two `for` loops — one printing odd numbers in an ascending range, one printing even numbers in a descending range.

```php
for($i = 2; $i <= 20; $i++){
    if($i % 2 != 0)
        echo $i . " ";
}

for($i = 35; $i >= 7; $i--){
    if($i % 2 == 0)
        echo $i . " ";     
}
```

**Concepts demonstrated:**

- **Ascending `for` loop:** `for($i = 2; $i <= 20; $i++)` counts upward from `2` to `20`, checking each value with `$i % 2 != 0` to filter for odd numbers.
- **Descending `for` loop:** `for($i = 35; $i >= 7; $i--)` counts backward from `35` down to `7`, filtering for even numbers with `$i % 2 == 0`.
- **String concatenation with `.`:** `echo $i . " ";` joins the number and a space using PHP's concatenation operator, rather than the comma syntax used in Week 2.
- **Filtering inside a loop:** Both loops iterate over every number in their range but only `echo` the ones that pass the `if` condition.

---

## 4. `Assignment4.png` — Numbers Divisible by 2 and 5

**What this screenshot shows:** a descending loop that prints every number divisible by both 2 and 5.

```php
for($number = 50; $number >= 2; $number--)
    if($number % 2 == 0 && $number % 5 ==0)
        echo "$number, ";
```

**Concepts demonstrated:**

- **Descending `for` loop:** `$number` starts at `50` and decreases to `2`, checking every value along the way.
- **Combined modulus check:** `$number % 2 == 0 && $number % 5 == 0` — a shorthand way of checking divisibility by `10`, expressed here as divisibility by 2 **and** 5 together.
- **No braces on the `for` loop body:** Since the loop body is a single `if` statement, no `{}` is required — consistent with the single-statement rule seen in Week 2.
- **Inline string interpolation:** `"$number, "` embeds the variable directly inside the string, followed by a comma separator for the printed list.

---

## 5. `Assignment5.png` — Reversing a Number

**What this screenshot shows:** a string treated as a numeric string and reversed character by character using a descending loop.

```php
$reversenum= "123456";
echo "The reverse of $reversenum is ";
for($r = 5; $r >= 0; $r--)
    echo $reversenum [$r];
```

**Concepts demonstrated:**

- **String as an array of characters:** `$reversenum[$r]` accesses an individual character of the string `$reversenum` by its index, treating the string like a zero-indexed character array.
- **Descending loop for reversal:** `for($r = 5; $r >= 0; $r--)` starts at the last index (`5`, the final character of a 6-character string) and counts down to `0`, printing characters from last to first.
- **Zero-based indexing:** The string `"123456"` has indexes `0` through `5`, so the loop's starting point (`5`) correctly targets the last character.
- **Result for this example:** Reversing `"123456"` produces `"654321"`.

---

## 6. `Assignment6&7.png` — LCM and HCF of Two Numbers

**What this screenshot shows:** the Least Common Multiple (LCM) found using a `while` loop, and the Highest Common Factor (HCF) found using a `for` loop.

```php
$number1= 8;
$number2= 12;

$lcm= $number1;
$hcf= 1;

while($lcm % $number2 != 0){
    $lcm = $lcm + $number1;
}
echo "LCM of $number1 and $number2 = $lcm";

for($j=1; $j<= $number1 && $j <= $number2; $j++){
    if($number1 % $j == 0 && $number2 % $j == 0)
        $hcf = $j;
}

echo "The HCF of $number1 and $number2 is $hcf";
```

**Concepts demonstrated:**

- **Finding LCM with a `while` loop:** `$lcm` starts at `$number1` and repeatedly adds `$number1` to itself until it's evenly divisible by `$number2` (`$lcm % $number2 != 0` becomes false).
- **Finding HCF with a `for` loop:** `$j` counts from `1` up to the smaller of `$number1`/`$number2` (via the combined condition `$j <= $number1 && $j <= $number2`), and `$hcf` is updated to the largest `$j` that divides both numbers evenly.
- **"Keep the last match" pattern:** Since the loop checks every `$j` in order and overwrites `$hcf` each time a common factor is found, the final value left in `$hcf` after the loop is the **highest** common factor.
- **Result for this example:** For `8` and `12`, the LCM is `24` and the HCF is `4`.

---

## 7. `Assignment9.png` — Prime Number Check

**What this screenshot shows:** a number tested for primality by counting how many numbers evenly divide it.

```php
$num = 9; 
$count = 0; 
for ($i = 1; $i <= $num; $i++) { 
    if ($num % $i == 0) { 
        $count++; 
    } 
} 
if ($count == 2) { 
    echo "$num is a prime number"; 
} 
else { 
    echo "$num is a non-prime number"; 
} 
```

**Concepts demonstrated:**

- **Counting divisors:** The loop checks every integer from `1` to `$num` and increments `$count` each time `$num % $i == 0` is true — i.e. each time `$i` divides `$num` evenly.
- **Primality rule:** A number is prime if and only if it has **exactly two** divisors (`1` and itself), so the code checks `$count == 2` after the loop finishes.
- **Braces used explicitly:** Unlike some earlier assignments, every block here uses `{}` even where a single statement would allow their omission.
- **Result for this example:** `$num = 9` has divisors `1`, `3`, and `9` (`$count = 3`), so it is correctly identified as a **non-prime** number.

---

## Screenshot Folder Structure

```
Week 3/
└── Screenshots/
    ├── Assignment1.png
    ├── Assignment2.png
    ├── Assignment3.png
    ├── Assignment4.png
    ├── Assignment5.png
    ├── Assignment6&7.png
    ├── Assignment9.png
    └── README.md
```

Each image above corresponds to the matching numbered section in this README. The source file they were captured from (`index.php`) lives in the parent `Week 3` folder and is documented separately in that folder's own `README.md`.
